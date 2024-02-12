function initialOrderFoodPage(showProductsUrl, showProductUrl) {
    // food menu
    const menuToggleBtn = document.querySelector("#menuToggle");
    const closeMenuBtn = document.querySelector("#menuClose");
    const mainMenu = document.querySelector("#mainMenu");
    const mainMenuLinks = document.querySelectorAll(".category-link");

    // cart menu
    const cartToggleBtn = document.querySelector("#cartToggle");
    const cartMenu = document.querySelector("#cartMenu");
    const closeCartBtn = document.querySelector("#cartClose");
    const cartItemTemplate = document.querySelector("#cart-item-template");
    const cartItemsContainer = document.querySelector("#cartItemsContainer");

    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');

    // food
    const foodCardsContainer = document.querySelector("#foodCards");
    const foodCardTemplate = document.querySelector("#food-card-template");
    const productDetailContainer = document.querySelector("#product-detail");

    async function getProductsData(url, data) {
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
                generateFoodCards(response.data);
            } else {
                throw new Error("Network failed!");
            }
        } catch (error) {
            console.error("Error fetch data:", error.message);
        }
    }

    async function getProductData(url, data) {
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
                modifyProductDetailInfo(response.data);
            } else {
                throw new Error("Network failed!");
            }
        } catch (error) {
            console.error("Error fetch data:", error.message);
        }
    }

    function generateFoodCards(data) {
        foodCardsContainer.innerHTML = "";
        data.forEach(function (datum) {
            const foodCard = foodCardTemplate.cloneNode(true);
            foodCard.removeAttribute("id");
            foodCard.setAttribute("data-product", datum.id);
            foodCard.classList.remove("hidden");

            let spans = foodCard.querySelectorAll("span");
            let names = datum.name.split(" ");
            spans[0].textContent = `$${Math.floor(datum.price)}`;
            spans[1].textContent = names[0];
            spans[2].textContent = names[1];

            const button = foodCard.querySelector("button");
            button.addEventListener("click", function (e) {
                getProductData(showProductUrl, { product_id: datum.id });
                open_container(productDetailContainer);
            });

            foodCardsContainer.appendChild(foodCard);
        });
    }

    function modifyProductDetailInfo(data) {
        let descriptionSpans =
            productDetailContainer.querySelectorAll(".description");
        let descriptions = data.description.split(";");
        descriptionSpans[0].textContent = descriptions[0];
        descriptionSpans[1].textContent = descriptions[1];

        productDetailContainer.querySelector(
            ".price"
        ).textContent = `$${Math.floor(data.price)}`;
        productDetailContainer.querySelector(".product-name").textContent =
            data.name;
        productDetailContainer.querySelector(
            "input[name='product_name']"
        ).value = data.name;
        productDetailContainer.querySelector("input[name='unit_price']").value =
            Number(data.price);
    }

    function open_container(container) {
        container.style.gridTemplateRows = "1fr";
    }

    function close_container(container) {
        container.style.gridTemplateRows = "0fr";
        container.querySelector("form").classList.add("overflow-hidden");
    }

    mainMenuLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            let category = e.target.dataset.category;
            if (!category) return;

            getProductsData(showProductsUrl, { category_name: category });
            close_container(productDetailContainer);
        });
    });

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

    closeCartBtn.addEventListener("click", function (e) {
        e.preventDefault();
        cartMenu.classList.add("translate-x-full", "opacity-0");
    });

    productDetailContainer
        .querySelector(".close-button")
        .addEventListener("click", function (e) {
            e.preventDefault();
            close_container(productDetailContainer);
        });

    productDetailContainer
        .querySelector("button[type='submit']")
        .addEventListener("click", function (e) {
            e.preventDefault();
            const { value: productName } = productDetailContainer.querySelector(
                "input[name='product_name']"
            );
            const { value: unitPrice } = productDetailContainer.querySelector(
                "input[name='unit_price']"
            );
            const { value: quantity } =
                productDetailContainer.querySelector("select");

            const data = {
                productName,
                quantity: Number(quantity),
                totalPrice: unitPrice * quantity,
            };

            createCartItem(data);
        });

    function createCartItem(data) {
        const item = cartItemTemplate.cloneNode(true);
        item.removeAttribute("id");
        item.classList.remove("hidden");

        item.querySelector("span:nth-child(1)").textContent = data.productName;
        item.querySelector(
            "span:nth-child(2)"
        ).textContent = `x${data.quantity}`;
        item.querySelector(
            "span:nth-child(3)"
        ).textContent = `$${data.totalPrice}`;

        item.querySelector("input[name='products[]']").value = data.quantity;

        cartItemsContainer.insertAdjacentElement("afterbegin", item);
    }
}

export { initialOrderFoodPage };
