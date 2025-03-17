</div>
    </main>

    <footer class="bg-gray-800 text-white pt-12 pb-8 mt-auto" itemscope itemtype="http://schema.org/WPFooter">
        <div class="container mx-auto px-4">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- About Section -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">About OneNetly</h3>
                    <p class="text-gray-400 text-sm mb-4">
                        Your platform for discovering and sharing knowledge. Join our community of writers and readers.
                    </p>
                    <!-- Social Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="index.php" class="text-gray-400 hover:text-white transition">Home</a>
                        </li>
                        <li>
                            <a href="about.php" class="text-gray-400 hover:text-white transition">About Us</a>
                        </li>
                        <li>
                            <a href="sitemap.php" class="text-gray-400 hover:text-white transition">Sitemap</a>
                        </li>
                        <li>
                            <a href="contact.php" class="text-gray-400 hover:text-white transition">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="privacy-policy.php" class="text-gray-400 hover:text-white transition">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="terms-of-service.php" class="text-gray-400 hover:text-white transition">Terms of Service</a>
                        </li>
                        <li>
                            <a href="dmca-policy.php" class="text-gray-400 hover:text-white transition">DMCA Policy</a>
                        </li>
                        <li>
                            <a href="disclaimer.php" class="text-gray-400 hover:text-white transition">Disclaimer</a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 text-sm mb-4">Subscribe to our newsletter to get updates.</p>
                    <form action="subscribe.php" method="POST" class="space-y-3">
                        <input type="email" name="email" placeholder="Enter your email" 
                               class="w-full px-3 py-2 text-gray-700 bg-gray-900 border border-gray-700 rounded focus:outline-none focus:border-indigo-500">
                        <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-400 text-sm mb-4 md:mb-0">
                        <p>&copy; <?php echo date('Y'); ?> <span itemprop="copyrightHolder">OneNetly</span>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Organization Schema -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "OneNetly",
            "url": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>",
            "logo": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/images/logo.png"; ?>",
            "sameAs": [
                "https://twitter.com/onenetly",
                "https://facebook.com/onenetly",
                "https://github.com/onenetly",
                "https://linkedin.com/company/onenetly"
            ]
        }
        </script>
    </footer>

    <!-- Navigation and Menu Scripts -->
    <script src="assets/js/navigation.js"></script>
</body>
</html>
