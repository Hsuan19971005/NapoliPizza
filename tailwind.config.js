const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "pizza-white": "#fff8ed",
                "pizza-red": "#A60321",
                "pizza-green": "#A0BC3A",
                "pizza-yellow": "#F2CF63",
                "pizza-brown": "#D9A87E",
                "pizza-orange": "#F27127",
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],
};
