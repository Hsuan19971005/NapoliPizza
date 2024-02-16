import Swal from "sweetalert2";
function initialCreateOrderPage() {
    const timeSection = document.querySelector("#time-section");
    const form = document.querySelector("form");
    const fillingBtn = document.querySelector("#filling-button");
    const submitBtn = document.querySelector("button[type='submit']");
    const timeSelect = document.querySelector("#time-select");
    const deliveryDate = document.querySelector("#delivery-date");

    fillingBtn.addEventListener("click", (e) => {
        e.preventDefault();
        if (form.checkValidity()) {
            timeSection.hidden = false;
            submitBtn.hidden = false;
            fillingBtn.hidden = true;
            generateTimeOptoins();
        } else {
            fireAlert("資料尚未填寫");
        }
    });

    submitBtn.addEventListener("click", (e) => {
        e.preventDefault();
        if (!form.checkValidity()) {
            fireAlert("資料尚未填寫");
            return;
        }

        if (timeSelect.value === "") {
            fireAlert("尚未選擇時間");
            return;
        }

        form.submit();
    });

    function fireAlert(title) {
        Swal.fire({
            title: title,
            icon: "warning",
            padding: "1em",
            width: "400px",
            confirmButtonText: "我知道了",
            confirmButtonColor: "#a0bc3a",
            customClass: {
                title: "text-gray-500 text-xl",
            },
        });
    }

    function generateTimeOptoins() {
        timeSelect.innerHTML = "";

        const givenDate = new Date(deliveryDate.textContent);
        const currentTime = new Date();
        const startingTime = new Date();

        if (givenDate.toDateString() === currentTime.toDateString()) {
            // Set the starting time to 1 hour from now
            startingTime.setHours(startingTime.getHours() + 1);
            startingTime.setMinutes(
                Math.ceil(startingTime.getMinutes() / 30) * 30
            );
            startingTime.setSeconds(0);
        } else {
            // Set the ending time to 10 AM
            startingTime.setDate(givenDate.getDate());
            startingTime.setHours(10, 0, 0, 0);
        }

        // Set the ending time to 9 PM
        const endTime = new Date(startingTime);
        endTime.setHours(21, 0, 0, 0);

        while (startingTime <= endTime) {
            const option = document.createElement("option");
            let localTime = startingTime.toLocaleTimeString("zh-TW", {
                hour: "2-digit",
                minute: "2-digit",
            });
            option.value = option.textContent = localTime;
            timeSelect.appendChild(option);

            // Increment time by 30 minutes
            startingTime.setMinutes(startingTime.getMinutes() + 30);
            startingTime.setSeconds(0);
            startingTime.setMilliseconds(0);
        }
    }
}

export { initialCreateOrderPage };
