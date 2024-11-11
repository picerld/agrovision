import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./node_modules/flyonui/dist/js/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("flyonui"), require("flyonui/plugin")],

    flyonui: {
        themes: ["light", "dark", "gourmet", "corporate", "luxury", "soft"],
        darkTheme: "dark",
        base: true,
        styled: true,
        utils: true,
        vendors: false,
        logs: true,
        themeRoot: ":root",
    },
};
