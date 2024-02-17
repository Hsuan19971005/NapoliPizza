function initializeMenuPage() {
    const goTopBtn = document.querySelector("#go-top");

    window.addEventListener("scroll", function () {
        if (document.documentElement.scrollTop > 40) {
            goTopBtn.classList.remove("opacity-0");
        } else {
            goTopBtn.classList.add("opacity-0");
        }
    });

    goTopBtn.addEventListener("click", scrollToTop);

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }
}

export { initializeMenuPage };
