import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            gridTemplateColumns: {
                tiga: "repeat(3, minmax(0, 1fr))",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [],
};
