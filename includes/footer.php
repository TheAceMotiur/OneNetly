    </div>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <div>
                    <p>&copy; <?php echo date('Y'); ?> OneNetly. All rights reserved.</p>
                </div>
                <div>
                    <a href="index.php" class="text-white hover:text-gray-300 mr-4">Home</a>
                    <?php if ($user->isLoggedIn()): ?>
                        <a href="dashboard.php" class="text-white hover:text-gray-300 mr-4">Dashboard</a>
                    <?php else: ?>
                        <a href="login.php" class="text-white hover:text-gray-300 mr-4">Login</a>
                        <a href="register.php" class="text-white hover:text-gray-300">Register</a>
                    <?php endif; ?>
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
