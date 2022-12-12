/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        fontFamily: {
            base: ["Open sans", "sans-serif"],
            roboto: ["Roboto Slab", "sans-serif"],
        },
    },
    plugins: [],
};
