<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "Disclaimer";

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h1 class="text-2xl font-semibold text-center">Disclaimer</h1>
    </div>
    <div class="p-6">
        <div class="prose max-w-none">
            <p class="text-gray-600 mb-6">Last updated: <?php echo date('F d, Y'); ?></p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">1. Website Disclaimer</h2>
            <p>The information provided by OneNetly ("we," "us," or "our") on our website is for general informational purposes only. All information on the site is provided in good faith, however, we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on our website.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">2. External Links Disclaimer</h2>
            <p>Our website may contain links to external websites that are not provided or maintained by or in any way affiliated with us. Please note that we do not guarantee the accuracy, relevance, timeliness, or completeness of any information on these external websites.</p>
            <p class="mt-3">We are not responsible for any content, features, products, services, or practices of third-party websites. Visiting these external sites is at your own risk. We recommend that you review the terms and policies of every website you visit.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">3. Content Disclaimer</h2>
            <p>We are not responsible or liable for any content, files, or links posted by users of our website. This includes but is not limited to: text, images, videos, or software that may be uploaded, posted, emailed, transmitted or otherwise made available through our website.</p>
            <p class="mt-3">OneNetly does not endorse any content contributed by users. We expressly disclaim any responsibility for user-submitted content or any loss or damage arising from it.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">4. Downloads and Files</h2>
            <p>OneNetly is not responsible for any files, software, or other materials made available for download through our website. We do not guarantee the safety, compatibility, or reliability of any downloadable content. Users download and use such materials at their own risk.</p>
            <p class="mt-3">We strongly recommend users to verify the source of any downloads, scan files for viruses, and ensure they have proper legal rights to use any downloaded materials.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">5. Professional Disclaimer</h2>
            <p>Information provided on our website does not constitute professional advice. It is provided for general informational purposes only. You should not act upon the information provided without consulting with a qualified professional. If you rely on any information provided by our website, you do so solely at your own risk.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">6. Errors and Omissions</h2>
            <p>The information given by our website is not guaranteed to be correct, complete, or up to date. We do not warrant that the website will be error-free or uninterrupted, that defects will be corrected, or that our website or the server that makes it available are free of viruses or other harmful components.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">7. Fair Use Disclaimer</h2>
            <p>This website may use copyrighted material which has not always been specifically authorized by the copyright owner. We are making such material available for criticism, comment, news reporting, teaching, scholarship, or research. We believe this constitutes a "fair use" of any such copyrighted material as provided for in section 107 of the US Copyright Law.</p>
            <p class="mt-3">If you wish to use copyrighted material from this site for purposes of your own that go beyond fair use, you must obtain permission from the copyright owner.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">8. Views Expressed Disclaimer</h2>
            <p>The views and opinions contained in articles or posts on our website are those of the authors and do not necessarily reflect the official policy or position of OneNetly.</p>
            
            <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">9. Contact Us</h2>
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <p>If you have any questions about this Disclaimer, please contact us at:</p>
                <p class="mt-2"><strong>OneNetly</strong><br>
                123 Tech Street, Dhaka<br>
                Bangladesh<br>
                Email: legal@onenetly.com</p>
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
