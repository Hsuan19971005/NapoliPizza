import Swal from "sweetalert2";
function initialCreateOrderPage() {
    const timeSection = document.querySelector("#time-section");
    const form = document.querySelector("form");
    const fillingBtn = document.querySelector("#filling-button");
    const submitBtn = document.querySelector("button[type='submit']");
    const timeSelect = document.querySelector("#time-select");

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
        const currentTime = new Date();

        // Set the starting time to 1 hour from now
        const startingTime = new Date(currentTime.getTime() + 60 * 60 * 1000);
        startingTime.setMinutes(Math.ceil(startingTime.getMinutes() / 30) * 30);
        startingTime.setSeconds(0);

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
