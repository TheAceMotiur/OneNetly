<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Email
{
    private $settings;
    
    public function __construct($settings)
    {
        $this->settings = $settings;
    }
    
    /**
     * Send an email using PHPMailer
     * 
     * @param string|array $to Recipient email address(es)
     * @param string $subject Email subject
     * @param string $body Email body content
     * @param array $options Additional options (cc, bcc, isHTML, attachments)
     * @return array Result with success status and message
     */
    public function sendEmail($to, $subject, $body, $options = [])
    {
        // Check if required PHPMailer classes exist
        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            return [
                'success' => false,
                'message' => 'PHPMailer is not installed. Please run: composer require phpmailer/phpmailer'
            ];
        }
        
        try {
            // Get email settings from database
            $smtpHost = $this->settings->get('smtp_host', '');
            $smtpPort = (int)$this->settings->get('smtp_port', 587);
            $smtpSecure = $this->settings->get('smtp_secure', 'tls');
            $smtpUsername = $this->settings->get('smtp_username', '');
            $smtpPassword = $this->settings->get('smtp_password', '');
            $emailFromAddress = $this->settings->get('email_from_address', '');
            $emailFromName = $this->settings->get('email_from_name', 'OneNetly');
            
            // Check required settings
            if (empty($smtpHost) || empty($emailFromAddress)) {
                return [
                    'success' => false,
                    'message' => 'Email settings are not configured. Please configure SMTP settings in the admin panel.'
                ];
            }
            
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);
            
            // Server settings
            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->Port = $smtpPort;
            
            if (!empty($smtpSecure)) {
                $mail->SMTPSecure = $smtpSecure;
            }
            
            if (!empty($smtpUsername) && !empty($smtpPassword)) {
                $mail->SMTPAuth = true;
                $mail->Username = $smtpUsername;
                $mail->Password = $smtpPassword;
            }
            
            // Enable debug output for development
            if (defined('DEBUG') && DEBUG) {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            }
            
            // Recipients
            $mail->setFrom($emailFromAddress, $emailFromName);
            
            // Add multiple recipients if $to is an array
            if (is_array($to)) {
                foreach ($to as $recipient) {
                    $mail->addAddress($recipient);
                }
            } else {
                $mail->addAddress($to);
            }
            
            // Add CC recipients
            if (isset($options['cc']) && is_array($options['cc'])) {
                foreach ($options['cc'] as $cc) {
                    $mail->addCC($cc);
                }
            }
            
            // Add BCC recipients
            if (isset($options['bcc']) && is_array($options['bcc'])) {
                foreach ($options['bcc'] as $bcc) {
                    $mail->addBCC($bcc);
                }
            }
            
            // Content
            $isHTML = isset($options['isHTML']) ? (bool)$options['isHTML'] : true;
            $mail->isHTML($isHTML);
            $mail->Subject = $subject;
            $mail->Body = $body;
            
            // Set plain text body if provided
            if (isset($options['altBody'])) {
                $mail->AltBody = $options['altBody'];
            } else if ($isHTML) {
                // Auto-generate plain text version from HTML
                $mail->AltBody = strip_tags($body);
            }
            
            // Add attachments
            if (isset($options['attachments']) && is_array($options['attachments'])) {
                foreach ($options['attachments'] as $attachment) {
                    if (is_array($attachment) && isset($attachment['path'])) {
                        // Use custom filename if provided
                        if (isset($attachment['name'])) {
                            $mail->addAttachment($attachment['path'], $attachment['name']);
                        } else {
                            $mail->addAttachment($attachment['path']);
                        }
                    } else if (is_string($attachment)) {
                        $mail->addAttachment($attachment);
                    }
                }
            }
            
            // Send the email
            $mail->send();
            
            return [
                'success' => true,
                'message' => 'Email sent successfully'
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Email could not be sent. Error: ' . $mail->ErrorInfo
            ];
        }
    }
    
    /**
     * Generate and send a password reset token
     * 
     * @param string $email User's email address
     * @return array Result with success status and message
     */
    public function sendPasswordResetEmail($email)
    {
        try {
            // Check if user exists
            $user = $this->getUserByEmail($email);
            if (!$user) {
                // Return success anyway for security (don't reveal if email exists)
                return [
                    'success' => true,
                    'message' => 'If your email exists in our system, you will receive a password reset link shortly.'
                ];
            }
            
            // Generate a reset token
            $token = bin2hex(random_bytes(32));
            $expiry = date('Y-m-d H:i:s', time() + 3600); // 1 hour expiry
            
            // Store token in database
            $this->storeResetToken($user['id'], $token, $expiry);
            
            // Generate reset link
            $resetLink = 'http://' . $_SERVER['HTTP_HOST'] . '/OneNetly/reset-password.php?token=' . $token;
            
            // Build email body
            $subject = 'Reset Your OneNetly Password';
            $body = '
                <html>
                <head>
                    <title>Reset Your Password</title>
                </head>
                <body>
                    <div style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
                        <div style="background-color: #4f46e5; color: white; padding: 15px; text-align: center; border-radius: 5px 5px 0 0;">
                            <h1 style="margin: 0; font-size: 24px;">Password Reset Request</h1>
                        </div>
                        <div style="background-color: #f9fafb; padding: 20px; border-radius: 0 0 5px 5px; border: 1px solid #e5e7eb;">
                            <p>Hello ' . htmlspecialchars($user['username']) . ',</p>
                            <p>We received a request to reset your password. If you did not make this request, you can safely ignore this email.</p>
                            <p>To reset your password, click on the button below:</p>
                            <p style="text-align: center; margin: 25px 0;">
                                <a href="' . $resetLink . '" style="background-color: #4f46e5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Reset Password</a>
                            </p>
                            <p>Or copy and paste the following URL into your browser:</p>
                            <p style="background-color: #e5e7eb; padding: 10px; border-radius: 5px;">' . $resetLink . '</p>
                            <p>This link will expire in 1 hour.</p>
                            <p>Best regards,<br>The OneNetly Team</p>
                        </div>
                        <div style="text-align: center; margin-top: 15px; font-size: 12px; color: #6b7280;">
                            <p>This is an automated email. Please do not reply to this message.</p>
                        </div>
                    </div>
                </body>
                </html>
            ';
            
            // Send the email
            $result = $this->sendEmail($email, $subject, $body);
            
            if ($result['success']) {
                return [
                    'success' => true,
                    'message' => 'If your email exists in our system, you will receive a password reset link shortly.'
                ];
            } else {
                // Log the error but don't reveal it to the user
                error_log('Failed to send password reset email: ' . $result['message']);
                
                return [
                    'success' => false,
                    'message' => 'Failed to send password reset email. Please try again later.'
                ];
            }
            
        } catch (Exception $e) {
            error_log('Exception in sendPasswordResetEmail: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => 'An error occurred. Please try again later.'
            ];
        }
    }
    
    /**
     * Get user by email address
     * 
     * @param string $email Email address
     * @return array|false User data or false if not found
     */
    private function getUserByEmail($email)
    {
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT id, username, email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        return $stmt->fetch();
    }
    
    /**
     * Store a password reset token in the database
     * 
     * @param int $userId User ID
     * @param string $token Reset token
     * @param string $expiry Token expiry datetime
     */
    private function storeResetToken($userId, $token, $expiry)
    {
        global $pdo;
        
        // First, delete any existing token for this user
        $stmt = $pdo->prepare("DELETE FROM password_resets WHERE user_id = ?");
        $stmt->execute([$userId]);
        
        // Insert new token
        $stmt = $pdo->prepare("INSERT INTO password_resets (user_id, token, expiry) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $token, $expiry]);
    }
}
