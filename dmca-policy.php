<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "DMCA Policy";

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h1 class="text-2xl font-semibold text-center">DMCA Policy</h1>
    </div>
    <div class="p-6">
        <div class="prose max-w-none">
            <p class="text-gray-600 mb-4">Last updated: <?php echo date('F d, Y'); ?></p>
            
            <h2>Digital Millennium Copyright Act Notice & Policy</h2>
            <p>OneNetly respects the intellectual property rights of others and expects its users to do the same. In accordance with the Digital Millennium Copyright Act of 1998 ("DMCA"), we will respond expeditiously to claims of copyright infringement that are reported to our designated copyright agent.</p>
            
            <h2>Notification of Copyright Infringement</h2>
            <p>If you believe that your work has been copied in a way that constitutes copyright infringement, please provide our copyright agent with the following information in accordance with the DMCA:</p>
            <ol>
                <li>An electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest;</li>
                <li>A description of the copyrighted work that you claim has been infringed;</li>
                <li>A description of where the material that you claim is infringing is located on our website, with enough detail that we may find it;</li>
                <li>Your address, telephone number, and email address;</li>
                <li>A statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; and</li>
                <li>A statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner's behalf.</li>
            </ol>
            <p>Our designated copyright agent can be reached at:</p>
            <p>[Your Name/Company Name]<br>
            [Your Address in Bangladesh]<br>
            Email: [Your Email]</p>
            
            <h2>Counter-Notification</h2>
            <p>If you believe that your content that was removed (or to which access was disabled) is not infringing, or that you have the authorization from the copyright owner, the copyright owner's agent, or pursuant to the law, to post and use the material in your content, you may send a counter-notice containing the following information to our copyright agent:</p>
            <ol>
                <li>Your physical or electronic signature;</li>
                <li>Identification of the content that has been removed or to which access has been disabled and the location at which the content appeared before it was removed or disabled;</li>
                <li>A statement that you have a good faith belief that the content was removed or disabled as a result of mistake or a misidentification of the content; and</li>
                <li>Your name, address, telephone number, and email address, a statement that you consent to the jurisdiction of the courts in Bangladesh, and a statement that you will accept service of process from the person who provided notification of the alleged infringement.</li>
            </ol>
            <p>If our copyright agent receives a counter-notification, we may send a copy of the counter-notification to the original complaining party informing that person that we may replace the removed content or cease disabling it in 10 business days. Unless the copyright owner files an action seeking a court order against the content provider, member or user, the removed content may be replaced, or access to it restored, in 10 to 14 business days or more after receipt of the counter-notice, at our sole discretion.</p>
            
            <h2>Repeat Infringer Policy</h2>
            <p>In accordance with the DMCA and other applicable law, we have adopted a policy of terminating, in appropriate circumstances and at our sole discretion, users who are deemed to be repeat infringers. We may also at our sole discretion limit access to our website and/or terminate the accounts of any users who infringe any intellectual property rights of others, whether or not there is any repeat infringement.</p>
        </div>
        
        <div class="mt-8 flex justify-center">
            <a href="index.php" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                Return to Homepage
            </a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
