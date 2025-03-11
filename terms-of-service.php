<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "Terms of Service";

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h1 class="text-2xl font-semibold text-center">Terms of Service</h1>
    </div>
    <div class="p-6">
        <div class="prose max-w-none">
            <p class="text-gray-600 mb-4">Last updated: <?php echo date('F d, Y'); ?></p>
            
            <h2>Introduction</h2>
            <p>These terms and conditions ("Terms") govern your use of OneNetly's website and services. By accessing or using our website, you agree to be bound by these Terms. If you disagree with any part of the Terms, you may not access the website.</p>
            
            <h2>Definitions</h2>
            <p>For the purposes of these Terms:</p>
            <ul>
                <li>"Website" refers to OneNetly.</li>
                <li>"User," "You," and "Your" refers to the individual accessing this website.</li>
                <li>"Company," "We," "Our," and "Us" refers to OneNetly.</li>
                <li>"Content" refers to articles, text, images, graphics, logos, icons, and other material that appears on our Website.</li>
            </ul>
            
            <h2>User Accounts</h2>
            <p>When you create an account with us, you must provide information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Website.</p>
            <p>You are responsible for safeguarding the password that you use to access our Website and for any activities or actions under your password.</p>
            <p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
            
            <h2>User Conduct</h2>
            <p>You agree that you will not:</p>
            <ul>
                <li>Use our Website in any way that violates any applicable local, state, national or international law or regulation.</li>
                <li>Attempt to, or harass, abuse, or harm another person or group.</li>
                <li>Use another user's account without permission.</li>
                <li>Provide false or inaccurate information when registering an account.</li>
                <li>Interfere with or attempt to interrupt the proper operation of our Website through the use of any virus, device, information collection or transmission mechanism, software or routine, or access or attempt to gain access to any data, files, or passwords related to our Website through hacking, password or data mining, or any other means.</li>
                <li>Use our Website for any purpose that is illegal or prohibited by these Terms.</li>
                <li>Use our Website to post or transmit any material that is inappropriate, abusive, defamatory, obscene, or threatening.</li>
            </ul>
            
            <h2>Intellectual Property</h2>
            <p>The Website and its original content (excluding Content provided by users), features, and functionality are and will remain the exclusive property of OneNetly and its licensors. The Website is protected by copyright, trademark, and other laws of both the United States and foreign countries. Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of OneNetly.</p>
            
            <h2>User-Generated Content</h2>
            <p>Users may post content as comments or other interactive features as permitted. By submitting content to us, you grant us a worldwide, non-exclusive, royalty-free license to use, reproduce, modify, and distribute your content in connection with our Website and promotional materials. You represent and warrant that you own or control all rights in and to the content you submit.</p>
            
            <h2>Third-Party Links</h2>
            <p>Our Website may contain links to third-party websites or services that are not owned or controlled by OneNetly. OneNetly has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third-party websites or services. You further acknowledge and agree that OneNetly shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such websites or services.</p>
            
            <h2>Termination</h2>
            <p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms. Upon termination, your right to use our Website will immediately cease.</p>
            
            <h2>Limitation of Liability</h2>
            <p>In no event shall OneNetly, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the Website; (ii) any conduct or content of any third party on the Website; (iii) any content obtained from the Website; and (iv) unauthorized access, use or alteration of your transmissions or content, whether based on warranty, contract, tort (including negligence) or any other legal theory, whether or not we have been informed of the possibility of such damage.</p>
            
            <h2>Governing Law</h2>
            <p>These Terms shall be governed and construed in accordance with the laws of Bangladesh, without regard to its conflict of law provisions. Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights.</p>
            
            <h2>Changes to Terms</h2>
            <p>We reserve the right to modify or replace these Terms at any time at our sole discretion. If a revision is material, we will try to provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
            
            <h2>Contact Us</h2>
            <p>If you have any questions about these Terms, please contact us at: [Your Contact Email]</p>
        </div>
        
        <div class="mt-8 flex justify-center">
            <a href="index.php" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                Return to Homepage
            </a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
