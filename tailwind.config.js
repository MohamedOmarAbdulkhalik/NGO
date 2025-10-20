import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.json',
        './resources/js/**/**/*.vue',
    ],

    darkMode: 'class',
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
                colors: {
                'brand': '#1f2937', // gray-800
                'gold': '#fbbf24', // amber-400
                'dark-secondary': '#111827', // gray-900
                'dark-text': '#f3f4f6' // gray-100
            }
        },
    },

    plugins: [
        forms,
        require('tailwindcss-rtl'),
    ],
    
    rtl: true,
};