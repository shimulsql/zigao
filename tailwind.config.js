/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        fontFamily: {
            base: ["Inter", "sans-serif"],
            roboto: ["Roboto Slab", "sans-serif"],
        },
    },
    plugins: [
        require('flowbite/plugin'),
    ],
};
