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
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                jakarta: ["Plus Jakarta Sans"],
                poppins: ["Poppins"],
            },
            colors: {
                primary: "#093B3B",
                'btn-primary': "#FCD980"
            },
        },
    },

    plugins: [forms],
};
