import { error } from "laravel-mix/src/Log";

function initialOrderFoodPage(showProductUrl) {
    // food menu
    const menuToggleBtn = document.querySelector("#menuToggle");
    const closeMenuBtn = document.querySelector("#menuClose");
    const mainMenu = document.querySelector("#mainMenu");
    const mainMenuLinks = document.querySelectorAll(".category-link");

    // cart menu
    const cartToggleBtn = document.querySelector("#cartToggle");
    const cartMenu = document.querySelector("#cartMenu");
    const closeCartBtn = document.querySelector("#cartClose");

    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');

    console.log(mainMenuLinks);
    mainMenuLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            let category = e.target.dataset.category;
            if (!category) return;

            const data = { category_name: category };
            getProductData(showProductUrl, data);
        });
    });

    async function getProductData(url, data) {
        console.log(data);
        try {
            let response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfTokenMeta.content,
                },
                body: JSON.stringify(data),
            });
            if (response.ok) {
                response = await response.json();
                console.log(response);
            } else {
                throw new Error("Network failed!");
            }
        } catch (error) {
            console.error("Error fetch data:", error.message);
        }
    }

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
