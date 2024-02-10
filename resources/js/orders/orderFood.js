function initialOrderFoodPage(showProductUrl) {
    const menuToggleBtn = document.querySelector("#menuToggle");
    const closeMenuBtn = document.querySelector("#menuClose");
    const mainMenu = document.querySelector("#mainMenu");

    menuToggleBtn.addEventListener("click", function () {
        mainMenu.classList.toggle("-translate-x-full");
    });
    closeMenuBtn.addEventListener("click", function () {
        mainMenu.classList.add("-translate-x-full");
    });
}

export { initialOrderFoodPage };
