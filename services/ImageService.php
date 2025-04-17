<?php

require_once __DIR__ . '/../models/ApiKey.php';

class ImageService
{
    private $apiKeyModel;
    private $pixabayBaseUrl = 'https://pixabay.com/api/';
    private $unsplashBaseUrl = 'https://api.unsplash.com/';
    
    public function __construct() {
        $this->apiKeyModel = new ApiKey();
    }
    
    public function getImage($keyword) {
        // Try Unsplash first, fallback to Pixabay
        try {
            return $this->getUnsplashImage($keyword);
        } catch (Exception $e) {
            try {
                return $this->getPixabayImage($keyword);
            } catch (Exception $e2) {
                // Return a default image if both APIs fail
                return 'https://via.placeholder.com/800x450?text=Blog+Image';
            }
        }
    }
    
    public function getPixabayImage($keyword) {
        $apiKey = $this->apiKeyModel->getNextAvailableKey('pixabay');
        if (!$apiKey) {
            throw new Exception('No Pixabay API keys available');
        }
        
        $url = $this->pixabayBaseUrl . '?' . http_build_query([
            'key' => $apiKey['key'],
            'q' => urlencode($keyword),
            'image_type' => 'photo',
            'orientation' => 'horizontal',
            'safesearch' => true,
            'per_page' => 10
        ]);
        
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        // Update API key usage count
        $this->apiKeyModel->updateUsage($apiKey['id']);
        
        if (isset($data['hits']) && !empty($data['hits'])) {
            $randomIndex = array_rand($data['hits']);
            return $data['hits'][$randomIndex]['largeImageURL'];
        }
        
        throw new Exception('No images found on Pixabay');
    }
    
    public function getUnsplashImage($keyword) {
        $apiKey = $this->apiKeyModel->getNextAvailableKey('unsplash');
        if (!$apiKey) {
            throw new Exception('No Unsplash API keys available');
        }
        
        $url = $this->unsplashBaseUrl . 'search/photos?' . http_build_query([
            'query' => $keyword,
            'orientation' => 'landscape',
            'per_page' => 10
        ]);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Client-ID ' . $apiKey['key']
        ]);
        
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Update API key usage count
        $this->apiKeyModel->updateUsage($apiKey['id']);
        
        if ($statusCode === 200) {
            $data = json_decode($response, true);
            if (isset($data['results']) && !empty($data['results'])) {
                $randomIndex = array_rand($data['results']);
                return $data['results'][$randomIndex]['urls']['regular'];
            }
        }
        
        throw new Exception('No images found on Unsplash');
    }
}
