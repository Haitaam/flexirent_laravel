document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelectorAll(".navbar-burger");
    const menu = document.querySelectorAll(".navbar-menu");
    const close = document.querySelectorAll(".navbar-close");
    const backdrop = document.querySelectorAll(".navbar-backdrop");
    const searchbar = document.querySelector(".searchbar");

    function toggleMenu() {
        for (var j = 0; j < menu.length; j++) {
            menu[j].classList.toggle("hidden");
        }
        // Toggle searchbar visibility
        searchbar.classList.toggle("hidden");
    }

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener("click", toggleMenu);
        }
    }

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener("click", toggleMenu);
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener("click", toggleMenu);
        }
    }
});
