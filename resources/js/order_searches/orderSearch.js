function initialOrderSearchPage(reloadCaptchaUrl) {
    const reloadBtn = document.querySelector("#reload");
    const captchaImg = document.querySelector("#captcha-img");
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');

    reloadBtn.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("press");
        getCaptchaImg(reloadCaptchaUrl);
    });

    async function getCaptchaImg(url) {
        try {
            let response = await fetch(url, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfTokenMeta.content,
                },
            });
            if (response.ok) {
                response = await response.json();
                captchaImg.src = response.data;
            } else {
                throw new Error("Network failed!");
            }
        } catch (error) {
            console.error("Error fetch data:", error.message);
        }
    }
}

export { initialOrderSearchPage };
