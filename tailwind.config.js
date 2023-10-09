import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            dark: {
                50: "hsla(0, 0%, 95%, 1)",
                100: "hsla(0, 0%, 89%, 1)",
                200: "hsla(0, 0%, 78%, 1)",
                300: "hsla(0, 0%, 67%, 1)",
                400: "hsla(0, 0%, 56%, 1)",
                500: "hsla(0, 0%, 45%, 1)",
                600: "hsla(0, 0%, 34%, 1)",
                700: "hsla(0, 0%, 24%, 1)",
                800: "hsla(0, 0%, 13%, 1)",
                900: "hsla(0, 0%, 1%, 1)",
                950: "hsla(0, 0%, 1%, 1)",
            },
            'white': '#ffffff',
        },
    },

    plugins: [forms, typography],
};
