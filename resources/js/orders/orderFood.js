import Swal from "sweetalert2";
import Cookies from "js-cookie";

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

    initCartItems();

    async function getProductsData(url, data) {
        try {
            const urlWithParams = new URL(url);
            urlWithParams.searchParams.append(data.paramName, data.value);

            let response = await fetch(urlWithParams, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfTokenMeta.content,
                },
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
            const urlWithParams = new URL(url);
            urlWithParams.searchParams.append(data.paramName, data.value);

            let response = await fetch(urlWithParams, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfTokenMeta.content,
                },
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
        data.forEach((datum) => {
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
            button.addEventListener("click", (e) => {
                getProductData(showProductUrl, {
                    paramName: "productId",
                    value: datum.id,
                });
                openContainer(productDetailContainer);
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

    function openContainer(container) {
        container.style.gridTemplateRows = "1fr";
    }

    function closeContainer(container) {
        container.style.gridTemplateRows = "0fr";
        container.querySelector("form").classList.add("overflow-hidden");
    }

    function initCartItems() {
        let cookie = Cookies.get("cart");
        const cartItems = cookie ? JSON.parse(cookie) : [];

        cartItems.forEach((item) => {
            const data = {
                productName: item.name,
                quantity: Number(item.quantity),
                totalPrice: Number(item.price) * Number(item.quantity),
            };
            createSingleCartItem(data);
        });
    }

    function createSingleCartItem(data) {
        const item = cartItemTemplate.cloneNode(true);
        item.removeAttribute("id");
        item.classList.remove("hidden");

        item.querySelector("button").addEventListener("click", (e) => {
            e.preventDefault();
            item.remove();
        });

        item.querySelector("span:nth-child(1)").textContent = data.productName;
        item.querySelector(
            "span:nth-child(2)"
        ).textContent = `x${data.quantity}`;
        item.querySelector(
            "span:nth-child(3)"
        ).textContent = `$${data.totalPrice}`;

        let input = document.createElement("input");
        input.setAttribute("name", `products[${data.productName}][]`);
        input.value = data.quantity;
        input.hidden = true;
        item.appendChild(input);

        cartItemsContainer.insertAdjacentElement("afterbegin", item);
    }

    function fireToast() {
        let position = window.screen.width >= 768 ? "top" : "top-start";
        const Toast = Swal.mixin({
            toast: true,
            position: position,
            width: "auto",
            showConfirmButton: false,
            timer: 2500,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });
        Toast.fire({
            icon: "success",
            title: "已加入購物車",
        });
    }

    mainMenuLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            let category = e.target.dataset.category;
            if (!category) return;

            getProductsData(showProductsUrl, {
                paramName: "categoryName",
                value: category,
            });
            closeContainer(productDetailContainer);
        });
    });

    menuToggleBtn.addEventListener("click", () => {
        mainMenu.classList.toggle("-translate-x-full");
    });

    closeMenuBtn.addEventListener("click", () => {
        mainMenu.classList.add("-translate-x-full");
    });

    cartToggleBtn.addEventListener("click", () => {
        cartMenu.classList.toggle("translate-x-full");
        cartMenu.classList.toggle("opacity-0");
    });

    closeCartBtn.addEventListener("click", (e) => {
        e.preventDefault();
        cartMenu.classList.add("translate-x-full", "opacity-0");
    });

    productDetailContainer
        .querySelector(".close-button")
        .addEventListener("click", (e) => {
            e.preventDefault();
            closeContainer(productDetailContainer);
        });

    productDetailContainer
        .querySelector("button[type='submit']")
        .addEventListener("click", (e) => {
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

            createSingleCartItem(data);
            closeContainer(productDetailContainer);
            fireToast();
        });
}

export { initialOrderFoodPage };
