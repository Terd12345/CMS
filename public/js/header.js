let prevScrollpos = window.pageYOffset;
    const navbar = document.getElementById("navbar");
    const navbarLinks = document.getElementById("navbar-links");

    window.onscroll = function () {
        let currentScrollPos = window.pageYOffset;

        if (prevScrollpos > currentScrollPos) {
            // Scrolling up
            navbar.style.top = "0";
            navbar.style.opacity = "1"; // Make navbar visible
            navbarLinks.style.opacity = "1"; // Make navbar links visible
        } else {
            // Scrolling down
            navbar.style.top = "-180px"; // Hides navbar
            navbar.style.opacity = "0"; // Make navbar hidden
            navbarLinks.style.opacity = "0"; // Make navbar links hidden
        }

        prevScrollpos = currentScrollPos;
    };

   
    



    document.addEventListener("DOMContentLoaded", function () {
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
    
        // Toggle visibility
        mobileMenuButton.addEventListener("click", () => {
            if (mobileMenu.classList.contains("hidden")) {
                mobileMenu.classList.remove("hidden");
                mobileMenu.classList.add("flex");
            } else {
                mobileMenu.classList.add("hidden");
                mobileMenu.classList.remove("flex");
            }
        });
    
        // Ensure menu hides on resize
        window.addEventListener("resize", () => {
            if (window.innerWidth > 768) {
                mobileMenu.classList.add("hidden");
                mobileMenu.classList.remove("flex");
            }
        });
    });
    






    // Hide loader when the page is fully loaded
    window.addEventListener('load', () => {
        const loader = document.getElementById('screen-loader');
        loader.classList.add('hidden');
    });

    // Optional: Show loader during AJAX requests
    document.addEventListener('DOMContentLoaded', () => {
        const loader = document.getElementById('screen-loader');

        // Listen for AJAX start and end events
        document.addEventListener('ajaxStart', () => {
            loader.classList.remove('hidden');
        });
        document.addEventListener('ajaxComplete', () => {
            loader.classList.add('hidden');
        });
    });