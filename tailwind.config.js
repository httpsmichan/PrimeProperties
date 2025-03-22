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
            fontFamily: {
                alice: ["Alice", "serif"],
                poppins: ["Poppins", "sans-serif"],
                josefin: ["Josefin Sans", "sans-serif"],
                lora: ["Lora", "serif"],
                outfit: ["Outfit", "sans-serif"],
                rowdies: ["Rowdies", "cursive"],
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
