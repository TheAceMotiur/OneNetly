<?php
/**
 * AdSense Ad Units Management File
 * This file provides functions for different ad placements throughout the site
 */

// Configuration - Update this with your actual AdSense information
$adsensePublisherId = 'ca-pub-9354746037074515'; // Your publisher ID
$adsenseEnabled = true; // Control global ads visibility

/**
 * Display responsive horizontal ad banner
 */
function displayHorizontalAd() {
    global $adsensePublisherId, $adsenseEnabled;
    if (!$adsenseEnabled) return;
    ?>
    <div class="ad-container horizontal-ad my-6 text-center bg-gray-50 py-3 px-2 rounded-lg border border-gray-100">
        <div class="text-xs text-gray-400 mb-1">Advertisement</div>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo $adsensePublisherId; ?>"
             crossorigin="anonymous"></script>
        <!-- OneNetly Horizontal -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="<?php echo $adsensePublisherId; ?>"
             data-ad-slot="4878379783"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <?php
}

/**
 * Display responsive sidebar ad
 */
function displaySidebarAd() {
    global $adsensePublisherId, $adsenseEnabled;
    if (!$adsenseEnabled) return;
    ?>
    <div class="ad-container sidebar-ad mb-6 bg-gray-50 py-3 px-2 rounded-lg border border-gray-100">
        <div class="text-xs text-gray-400 mb-1 text-center">Advertisement</div>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo $adsensePublisherId; ?>"
             crossorigin="anonymous"></script>
        <!-- OneNetly Sidebar -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="<?php echo $adsensePublisherId; ?>"
             data-ad-slot="4878379783"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <?php
}

/**
 * Display in-article ad
 */
function displayInArticleAd() {
    global $adsensePublisherId, $adsenseEnabled;
    if (!$adsenseEnabled) return;
    ?>
    <div class="ad-container in-article-ad my-8 text-center bg-gray-50 py-3 px-2 rounded-lg border border-gray-100">
        <div class="text-xs text-gray-400 mb-1">Advertisement</div>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo $adsensePublisherId; ?>"
             crossorigin="anonymous"></script>
        <!-- OneNetly In-Article -->
        <ins class="adsbygoogle"
             style="display:block; text-align:center;"
             data-ad-layout="in-article"
             data-ad-format="fluid"
             data-ad-client="<?php echo $adsensePublisherId; ?>"
             data-ad-slot="4878379783"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <?php
}
?>
