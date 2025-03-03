document.getElementById("media-toggle").addEventListener("click", function () {
    let menu = document.getElementById("media-menu");
    let icon = document.getElementById("chevron-icon");

    // Check if the menu is currently closed (max-h-0)
    if (menu.classList.contains("max-h-0")) {
        // Delay before opening the dropdown
        setTimeout(() => {
            menu.classList.remove("max-h-0", "hidden");
            menu.classList.add("max-h-40", "opacity-100", "transition-all", "duration-300", "ease-in-out");
            icon.classList.add("rotate-180");
        }, 200); // 200ms delay before opening
    } else {
        // Delay before closing the dropdown
        setTimeout(() => {
            menu.classList.add("max-h-0");
            menu.classList.remove("max-h-40", "opacity-100");
            icon.classList.remove("rotate-180");
        }, 200); // 200ms delay before closing
    }
});