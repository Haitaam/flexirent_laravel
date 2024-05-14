document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelectorAll(".navbar-burger");
    const searchbar = document.querySelector(".searchbar");

    function hideSearchbar() {
        searchbar.classList.add("hidden");
    }

    if (burger.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener("click", hideSearchbar);
        }
    }
});
