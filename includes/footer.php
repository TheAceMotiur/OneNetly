</div>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <div>
                    <p>&copy; <?php echo date('Y'); ?> OneNetly. All rights reserved.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="index.php" class="text-white hover:text-gray-300 mr-4">Home</a>
                    <?php if ($user->isLoggedIn()): ?>
                        <a href="dashboard.php" class="text-white hover:text-gray-300 mr-4">Dashboard</a>
                    <?php else: ?>
                        <a href="login.php" class="text-white hover:text-gray-300 mr-4">Login</a>
                        <a href="register.php" class="text-white hover:text-gray-300 mr-4">Register</a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Legal Links -->
            <div class="mt-4 pt-4 border-t border-gray-700 text-sm text-gray-400">
                <div class="flex flex-wrap justify-center">
                    <a href="privacy-policy.php" class="hover:text-white mr-4 mb-2">Privacy Policy</a>
                    <a href="terms-of-service.php" class="hover:text-white mr-4 mb-2">Terms of Service</a>
                    <a href="dmca-policy.php" class="hover:text-white mr-4 mb-2">DMCA Policy</a>
                    <a href="disclaimer.php" class="hover:text-white mb-2">Disclaimer</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile category menu toggle
        document.getElementById('mobile-category-toggle')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-category-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        });
    </script>
</body>
</html>
