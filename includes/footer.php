</div>

    <footer class="bg-gray-800 text-white py-6" itemscope itemtype="http://schema.org/WPFooter">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center items-center">
                <div class="text-center">
                    <p>&copy; <?php echo date('Y'); ?> <span itemprop="copyrightHolder">OneNetly</span>. All rights reserved.</p>
                </div>
            </div>
            
            <!-- Legal Links -->
            <div class="mt-6 pt-4 border-t border-gray-700">
                <div class="flex flex-wrap justify-center space-x-1 md:space-x-4">
                    <a href="privacy-policy.php" class="text-gray-400 hover:text-white px-2 py-1 rounded hover:bg-gray-700 transition mb-2">Privacy Policy</a>
                    <a href="terms-of-service.php" class="text-gray-400 hover:text-white px-2 py-1 rounded hover:bg-gray-700 transition mb-2">Terms of Service</a>
                    <a href="dmca-policy.php" class="text-gray-400 hover:text-white px-2 py-1 rounded hover:bg-gray-700 transition mb-2">DMCA Policy</a>
                    <a href="disclaimer.php" class="text-gray-400 hover:text-white px-2 py-1 rounded hover:bg-gray-700 transition mb-2">Disclaimer</a>
                </div>
                <div class="text-center text-sm text-gray-500 mt-3">
                All items are released under the GPL (General Public License). Trusted and verified.
                If you require support please refer to the authors websites for additional offers.
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
            "logo": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/images/logo.png"; ?>"
        }
        </script>
    </footer>

    <!-- Mobile menu script -->
    <script>
        // Mobile category menu toggle
        document.getElementById('mobile-category-toggle')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-category-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        });
        
        // Dropdown menus
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const menu = dropdown.querySelector('.dropdown-menu');
            
            // On smaller screens, handle click events for dropdowns
            if (window.innerWidth < 1024) {
                dropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.toggle('hidden');
                });
            }
        });
        
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // User dropdown menu
        document.getElementById('user-menu-button')?.addEventListener('click', function() {
            const dropdown = document.getElementById('user-menu-dropdown');
            dropdown.classList.toggle('hidden');
        });
        
        // Close mobile menu and dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const userMenuDropdown = document.getElementById('user-menu-dropdown');
            const userMenuButton = document.getElementById('user-menu-button');
            
            // Close mobile menu when clicking outside
            if (mobileMenu && mobileMenuButton && 
                !mobileMenu.contains(e.target) && 
                !mobileMenuButton.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
            
            // Close user menu dropdown when clicking outside
            if (userMenuDropdown && userMenuButton && 
                !userMenuDropdown.contains(e.target) && 
                !userMenuButton.contains(e.target)) {
                userMenuDropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
