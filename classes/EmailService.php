<?php

class EmailService {
    private $pdo;
    private $settings;
    
    /**
     * Constructor
     * 
     * @param PDO $pdo PDO database connection
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->settings = new Settings($pdo);
    }
    
    /**
     * Send email
     * 
     * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param string $body Email body
     * @param array $options Additional options like attachments
     * @return bool Whether the email was sent successfully
     */
    public function sendEmail($to, $subject, $body, $options = []) {
        // Check if PHP mail function is available
        if (!function_exists('mail')) {
            return false;
        }
        
        // Get email settings
        $fromEmail = $this->settings->get('email_from', 'noreply@onenetly.com');
        $fromName = $this->settings->get('email_name', 'OneNetly');
        
        // Set headers
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: " . $fromName . " <" . $fromEmail . ">\r\n";
        $headers .= "Reply-To: " . $fromEmail . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Try to send email
        try {
            return mail($to, $subject, $body, $headers);
        } catch (Exception $e) {
            error_log("Error sending email: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Send a welcome email to new user
     * 
     * @param array $user User data including email and username
     * @return bool Whether the email was sent successfully
     */
    public function sendWelcomeEmail($user) {
        if (empty($user['email']) || empty($user['username'])) {
            return false;
        }
        
        $subject = "Welcome to OneNetly!";
        $body = $this->getWelcomeEmailTemplate($user['username']);
        
        return $this->sendEmail($user['email'], $subject, $body);
    }
    
    /**
     * Send a password reset email
     * 
     * @param string $email User's email address
     * @param string $resetToken Password reset token
     * @return bool Whether the email was sent successfully
     */
    public function sendPasswordResetEmail($email, $resetToken) {
        // Get user by email
        $stmt = $this->pdo->prepare("SELECT id, username FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if (!$user) {
            return false;
        }
        
        $resetLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . 
                     '://' . $_SERVER['HTTP_HOST'] . 
                     '/reset-password.php?token=' . $resetToken;
                     
        $subject = "Reset Your OneNetly Password";
        $body = $this->getPasswordResetEmailTemplate($user['username'], $resetLink);
        
        return $this->sendEmail($email, $subject, $body);
    }
    
    /**
     * Get welcome email template
     * 
     * @param string $username User's username
     * @return string HTML email template
     */
    private function getWelcomeEmailTemplate($username) {
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Welcome to OneNetly</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #4f46e5; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; border: 1px solid #e5e7eb; border-top: none; }
                .button { display: inline-block; background-color: #4f46e5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Welcome to OneNetly!</h1>
                </div>
                <div class="content">
                    <p>Hello ' . htmlspecialchars($username) . ',</p>
                    <p>Thank you for joining OneNetly. We\'re excited to have you as part of our community!</p>
                    <p>With your new account, you can:</p>
                    <ul>
                        <li>Explore and read our blog content</li>
                        <li>Leave comments on articles</li>
                        <li>Save your favorite articles</li>
                    </ul>
                    <p>If you have any questions, feel free to contact us.</p>
                    <p>Best regards,<br>The OneNetly Team</p>
                </div>
            </div>
        </body>
        </html>
        ';
    }
    
    /**
     * Get password reset email template
     * 
     * @param string $username User's username
     * @param string $resetLink Password reset link
     * @return string HTML email template
     */
    private function getPasswordResetEmailTemplate($username, $resetLink) {
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Reset Your OneNetly Password</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #4f46e5; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; border: 1px solid #e5e7eb; border-top: none; }
                .button { display: inline-block; background-color: #4f46e5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
                .reset-link { background-color: #f3f4f6; padding: 10px; border-radius: 5px; word-break: break-all; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Reset Your Password</h1>
                </div>
                <div class="content">
                    <p>Hello ' . htmlspecialchars($username) . ',</p>
                    <p>We received a request to reset your password. If you didn\'t make this request, you can safely ignore this email.</p>
                    <p>To reset your password, click on the button below:</p>
                    <p style="text-align: center;">
                        <a href="' . $resetLink . '" class="button">Reset Password</a>
                    </p>
                    <p>Or copy and paste the following URL into your browser:</p>
                    <div class="reset-link">' . $resetLink . '</div>
                    <p>This link will expire in 24 hours.</p>
                    <p>Best regards,<br>The OneNetly Team</p>
                </div>
            </div>
        </body>
        </html>
        ';
    }
}
