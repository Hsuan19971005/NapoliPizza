import { size } from "lodash";
import Swal from "sweetalert2";
function initializeDeliveryInfoPage() {
    let dateInput = document.querySelector("input[name='deliverTime']");
    const scrollableContent = document.querySelector("#scrollable-content");
    const contractCheckbox = document.querySelector("#contract-checkbox");
    const btnSendOrder = document.querySelector("#btnSendOrder");

    setDateInputRange(5);

    document.addEventListener("keypress", function (e) {
        // console.log(e.target);
        console.log(typeof dateInput.value);
        console.log(dateInput.value);
        console.log(contractCheckbox.checked);
    });

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
            // }else if(){
            //     fireAlert("請輸入外送地址！");
            // return false;
            // }else if(){
            //     fireAlert("請選擇外送門市！");
            // return false;
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
}

export { initializeDeliveryInfoPage };
