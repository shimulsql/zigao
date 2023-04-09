/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {},
        fontFamily: {
            base: ["Inter", "sans-serif"],
            roboto: ["Roboto Slab", "sans-serif"],
        },
    },
    plugins: [],
};
