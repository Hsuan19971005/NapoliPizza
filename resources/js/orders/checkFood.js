function initialCheckFoodPage() {
    const foodCards = document.querySelectorAll(".food-card");

    updateTotalPrice();

    foodCards.forEach((card) => {
        card.addEventListener("click", (e) => {
            e.preventDefault();
            e.currentTarget.remove();
            updateTotalPrice();
        });
    });

    function updateTotalPrice() {
        const unitPriceSpans = document.querySelectorAll(".unit-price");
        let sum = [...unitPriceSpans].reduce((acc, cur) => {
            return acc + cur.dataset.unitPrice * cur.dataset.quantity;
        }, 0);
        document.querySelector("#total-price").textContent = `${sum}`;
    }
}

export { initialCheckFoodPage };
