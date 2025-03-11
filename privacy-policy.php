<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "Privacy Policy";

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h1 class="text-2xl font-semibold text-center">Privacy Policy</h1>
    </div>
    <div class="p-6">
        <div class="prose max-w-none">
            <p class="text-gray-600 mb-6">Last updated: <?php echo date('F d, Y'); ?></p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">1. Introduction</h2>
            <p>At OneNetly, we respect your privacy and are committed to protecting your personal data. This privacy policy will inform you about how we look after your personal data when you visit our website and tell you about your privacy rights and how the law protects you.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">2. Information We Collect</h2>
            <p>We may collect, use, store and transfer different kinds of personal data about you which we have grouped together as follows:</p>
            <ul class="list-disc pl-6 mt-4 mb-4 space-y-2">
                <li><strong>Identity Data</strong> includes username or similar identifier.</li>
                <li><strong>Contact Data</strong> includes email address.</li>
                <li><strong>Technical Data</strong> includes internet protocol (IP) address, your login data, browser type and version, time zone setting and location, browser plug-in types and versions, operating system and platform, and other technology on the devices you use to access this website.</li>
                <li><strong>Usage Data</strong> includes information about how you use our website and services.</li>
            </ul>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">3. How We Collect Your Data</h2>
            <p>We use different methods to collect data from and about you including through:</p>
            <ul class="list-disc pl-6 mt-4 mb-4 space-y-2">
                <li>Direct interactions. You may give us your Identity and Contact Data by filling in forms or by corresponding with us by email or otherwise.</li>
                <li>Automated technologies or interactions. As you interact with our website, we may automatically collect Technical Data about your equipment, browsing actions, and patterns.</li>
            </ul>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">4. Cookies</h2>
            <p>Our website uses cookies to distinguish you from other users of our website. This helps us to provide you with a good experience when you browse our website and also allows us to improve our site.</p>
            <p class="mt-3">A cookie is a small file of letters and numbers that we store on your browser or the hard drive of your computer. Cookies contain information that is transferred to your computer's hard drive.</p>
            <p class="mt-3">We use the following cookies:</p>
            <ul class="list-disc pl-6 mt-4 mb-4 space-y-2">
                <li><strong>Strictly necessary cookies.</strong> These are cookies that are required for the operation of our website.</li>
                <li><strong>Analytical/performance cookies.</strong> They allow us to recognize and count the number of visitors and to see how visitors move around our website when they are using it.</li>
                <li><strong>Functionality cookies.</strong> These are used to recognize you when you return to our website.</li>
                <li><strong>Targeting cookies.</strong> These cookies record your visit to our website, the pages you have visited and the links you have followed.</li>
            </ul>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">5. Third-Party Advertising (Google AdSense)</h2>
            <p>We use Google AdSense, a service to serve advertisements on our website. Google AdSense may use cookies, web beacons, and other tracking technologies to collect information about your use of our website and other websites, including your IP address, web browser, pages viewed, time spent on pages, links clicked, and conversion information. This information may be used by Google and its partners to deliver advertisements on our website and other websites across the internet based on your browsing activity.</p>
            <p class="mt-3">For more information about how targeted advertising works, you can visit the Network Advertising Initiative's educational page at <a href="http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work" target="_blank" rel="noopener noreferrer">http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work</a>.</p>
            <p class="mt-3">You can opt out of targeted advertising by:</p>
            <ul class="list-disc pl-6 mt-4 mb-4 space-y-2">
                <li>FACEBOOK - <a href="https://www.facebook.com/settings/?tab=ads" target="_blank" rel="noopener noreferrer">https://www.facebook.com/settings/?tab=ads</a></li>
                <li>GOOGLE - <a href="https://www.google.com/settings/ads/anonymous" target="_blank" rel="noopener noreferrer">https://www.google.com/settings/ads/anonymous</a></li>
                <li>BING - <a href="https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads" target="_blank" rel="noopener noreferrer">https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads</a></li>
            </ul>
            <p class="mt-3">Additionally, you can opt out of some of these services by visiting the Digital Advertising Alliance's opt-out portal at <a href="http://optout.aboutads.info/" target="_blank" rel="noopener noreferrer">http://optout.aboutads.info/</a>.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">6. Data Security</h2>
            <p>We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used or accessed in an unauthorized way, altered or disclosed.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">7. Data Retention</h2>
            <p>We will only retain your personal data for as long as reasonably necessary to fulfill the purposes we collected it for, including for the purposes of satisfying any legal, regulatory, tax, accounting or reporting requirements.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">8. Your Legal Rights</h2>
            <p>Under certain circumstances, you have rights under data protection laws in relation to your personal data, including the right to:</p>
            <ul class="list-disc pl-6 mt-4 mb-4 space-y-2">
                <li>Request access to your personal data</li>
                <li>Request correction of your personal data</li>
                <li>Request erasure of your personal data</li>
                <li>Object to processing of your personal data</li>
                <li>Request restriction of processing your personal data</li>
                <li>Request transfer of your personal data</li>
                <li>Right to withdraw consent</li>
            </ul>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">9. Contact Us</h2>
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <p>If you have any questions about this privacy policy or our privacy practices, please contact us at:</p>
                <p class="mt-2"><strong>OneNetly</strong><br>
                123 Tech Street, Dhaka<br>
                Bangladesh<br>
                Email: contact@onenetly.com</p>
            </div>
        </div>
        
        <div class="mt-8 flex justify-center">
            <a href="index.php" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                Return to Homepage
            </a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
