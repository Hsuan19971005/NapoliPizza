import Swal from "sweetalert2";
function initializeDeliveryInfoPage(showShopUrl) {
    let dateInput = document.querySelector("input[name='deliveryTime']");
    const scrollableContent = document.querySelector("#scrollable-content");
    const contractCheckbox = document.querySelector("#contract-checkbox");
    const btnSendOrder = document.querySelector("#btnSendOrder");
    const selectDeliveryStore = document.querySelector("#deliveryStore");
    const selectStoreStrict = document.querySelector("#storeDistrict");
    const selectStoreCity = document.querySelector("#storeCity");
    const csrdTokenMeta = document.querySelector('meta[name="csrf-token"]');

    setDateInputRange(5);

    scrollableContent.addEventListener("scroll", function () {
        if (
            Math.abs(
                scrollableContent.scrollHeight -
                    scrollableContent.scrollTop -
                    scrollableContent.clientHeight
            ) <= 1
        ) {
            contractCheckbox.disabled = false;
        }
    });

    btnSendOrder.addEventListener("click", function (e) {
        if (checkAllInputs()) {
            console.log("送出表單>>>>>");
            e.preventDefault(); // 要記得拿掉
        } else {
            e.preventDefault();
        }
    });

    selectStoreCity.addEventListener("change", function (e) {
        if (e.target.value == "") return;

        const data = { city_name: e.target.value };
        getShopData(showShopUrl, data, selectStoreStrict);
    });

    selectStoreStrict.addEventListener("change", function (e) {
        if (e.target.value == "") return;

        const data = { district_name: e.target.value };
        getShopData(showShopUrl, data, selectDeliveryStore);
    });

    async function getShopData(url, data, select) {
        try {
            let response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrdTokenMeta.content,
                },
                body: JSON.stringify(data),
            });
            if (response.ok) {
                response = await response.json();
                removeOptions(select);
                addOptoins(select, response.data);
            } else {
                throw new Error("Network failed!");
            }
        } catch (error) {
            console.error("Error fetch data:", error.message);
        }
    }

    function setDateInputRange(days) {
        let today = new Date();
        let futureDate = new Date(today);
        futureDate.setDate(today.getDate() + days - 1);
        dateInput.value = dateInput.min = today.toISOString().split("T")[0];
        dateInput.max = futureDate.toISOString().split("T")[0];
    }

    function checkAllInputs() {
        if (dateInput.value === "") {
            fireAlert("請選擇日期！");
            return false;
        } else if (selectDeliveryStore.value == "") {
            fireAlert("請選擇外送門市！");
            return false;
        } else if (contractCheckbox.checked === false) {
            fireAlert("請確認您已閱讀預購說明！");
            return false;
        }
        return true;
    }

    function fireAlert(title) {
        Swal.fire({
            title: title,
            padding: "1em",
            width: "auto",
            confirmButtonText: "我知道了",
            confirmButtonColor: "#a0bc3a",
            customClass: {
                title: "text-gray-500 text-xl",
            },
        });
    }

    function removeOptions(selectElement) {
        for (let i = selectElement.options.length - 1; i > 0; i--) {
            selectElement.options[i].remove();
        }
    }

    function addOptoins(selectElement, options) {
        options.forEach((option) => {
            let newOption = document.createElement("option");
            newOption.value = option;
            newOption.textContent = option;
            selectElement.appendChild(newOption);
        });
    }
}

export { initializeDeliveryInfoPage };
