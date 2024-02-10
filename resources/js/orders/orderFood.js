function initialOrderFoodPage(showProductUrl) {
    const menuToggleBtn = document.querySelector("#menuToggle");
    const cartToggleBtn = document.querySelector("#cartToggle");
    const closeMenuBtn = document.querySelector("#menuClose");
    const mainMenu = document.querySelector("#mainMenu");
    const cartMenu = document.querySelector("#cartMenu");
    const closeCartBtn = document.querySelector("#cartClose");

    menuToggleBtn.addEventListener("click", function () {
        mainMenu.classList.toggle("-translate-x-full");
    });
    closeMenuBtn.addEventListener("click", function () {
        mainMenu.classList.add("-translate-x-full");
    });

    cartToggleBtn.addEventListener("click", function () {
        cartMenu.classList.toggle("translate-x-full");
        cartMenu.classList.toggle("opacity-0");
    });

    closeCartBtn.addEventListener("click", function () {
        cartMenu.classList.add("translate-x-full", "opacity-0");
    });
}

export { initialOrderFoodPage };
