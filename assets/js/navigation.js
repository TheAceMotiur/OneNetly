document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // User menu dropdown toggle
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenuDropdown = document.getElementById('user-menu-dropdown');
    
    if (userMenuButton && userMenuDropdown) {
        userMenuButton.addEventListener('click', function() {
            userMenuDropdown.classList.toggle('hidden');
        });
        
        // Close the dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!userMenuButton.contains(event.target) && !userMenuDropdown.contains(event.target)) {
                userMenuDropdown.classList.add('hidden');
            }
        });
    }
    
    // Mobile category menu toggle (if exists)
    const mobileCategoryToggle = document.getElementById('mobile-category-toggle');
    const mobileCategoryMenu = document.getElementById('mobile-category-menu');
    
    if (mobileCategoryToggle && mobileCategoryMenu) {
        mobileCategoryToggle.addEventListener('click', function() {
            mobileCategoryMenu.classList.toggle('hidden');
        });
    }
    
    // Handle dropdowns for smaller screens
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (window.innerWidth < 1024 && menu) {
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                menu.classList.toggle('hidden');
            });
        }
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        }
    });
});
