document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.querySelector('aside');
    const profileToggle = document.getElementById('profile-toggle');
    const profileMenu = document.getElementById('profile-menu');

    // Toggle Sidebar
    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('hidden');
    });

    // Toggle Profile Menu
    profileToggle.addEventListener('click', function (event) {
        event.stopPropagation(); // Prevent click from bubbling to document
        profileMenu.classList.toggle('hidden');
    });

    // Close Profile Menu when clicking outside
    document.addEventListener('click', function (event) {
        if (!profileMenu.contains(event.target) && !profileToggle.contains(event.target)) {
            profileMenu.classList.add('hidden');
        }
    });
});





document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        let message = document.getElementById('welcome-message');
        if (message) {
            message.style.transition = "opacity 0.5s ease";
            message.style.opacity = "0";
            setTimeout(() => message.remove(), 500); // Remove after fade out
        }
    }, 3000);
});