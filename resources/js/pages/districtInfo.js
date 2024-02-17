function initializeStoreLocationPage(showShopUrl) {
    const selectStoreStrict = document.querySelector("#storeDistrict");
    const selectStoreCity = document.querySelector("#storeCity");
    const csrdTokenMeta = document.querySelector('meta[name="csrf-token"]');

    setSelectsByQueryString(selectStoreCity, selectStoreStrict);

    selectStoreCity.addEventListener("change", function (e) {
        if (e.target.value == "") return;

        const data = { city_name: e.target.value };
        getShopData(showShopUrl, data, selectStoreStrict);
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

    function setSelectsByQueryString(citySelect, districtSelect) {
        const searchParams = new URLSearchParams(window.location.search);
        let city = searchParams.get("city");
        let district = searchParams.get("district");
        if (city) {
            setDefaultOption(citySelect, city);
            const data = { city_name: citySelect.value };
            getShopData(showShopUrl, data, districtSelect).then(() => {
                if (district) {
                    setDefaultOption(districtSelect, district);
                }
            });
        }
    }

    function setDefaultOption(selectElement, value) {
        let option = selectElement.querySelector(`[value=${value}]`);
        option.selected = true;
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

export { initializeStoreLocationPage };
