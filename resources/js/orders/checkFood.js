import Cookies from "js-cookie";

function initialCheckFoodPage() {
    const foodCards = document.querySelectorAll(".food-card");
    let cartCookie = [];

    updateTotalPrice();
    initCookie();

    foodCards.forEach((card) => {
        card.addEventListener("click", (e) => {
            e.preventDefault();
            e.currentTarget.remove();
            updateTotalPrice();
            deleteCookieItem(
                e.currentTarget.querySelector("input").dataset.productId
            );
        });
    });

    function updateTotalPrice() {
        const unitPriceSpans = document.querySelectorAll(".unit-price");
        let sum = [...unitPriceSpans].reduce((acc, cur) => {
            return acc + cur.dataset.unitPrice * cur.dataset.quantity;
        }, 0);
        document.querySelector("#total-price").textContent = `${sum}`;
    }

    function initCookie() {
        let cookie = Cookies.get("cart");
        cartCookie = cookie ? JSON.parse(cookie) : [];
    }

    function deleteCookieItem(id) {
        let restCart = cartCookie.filter((obj) => obj.id != id);
        if (restCart.length == 0) {
            Cookies.remove("cart");
        } else {
            Cookies.set("cart", JSON.stringify(restCart));
        }
    }
}

export { initialCheckFoodPage };
