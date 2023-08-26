const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    darkMode: "class",
    theme: {
        extend: {},
        colors: {
            ...colors,
            primary: {
                50: "#fdf2f7",
                100: "#fce7f1",
                200: "#fbcfe4",
                300: "#f9a8ce",
                400: "#f472ac",
                500: "#ee5d99",
                600: "#db2769",
                700: "#be1850",
                800: "#9d1742",
                900: "#83183a",
                950: "#50071e",
            },
            ebony: {
                50: "#f1f6fd",
                100: "#dfebfa",
                200: "#c7dcf6",
                300: "#a1c7ef",
                400: "#74a8e6",
                500: "#5389de",
                600: "#3e6ed2",
                700: "#355ac0",
                800: "#314b9c",
                900: "#2c427c",
                950: "#11172a",
            },
        },
    },
    plugins: [require("flowbite")],
};
