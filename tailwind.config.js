import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    50: '#f5f7ff',
                    100: '#eef2ff',
                    200: '#e0e7ff',
                    300: '#c7d2fe',
                    400: '#a5b4fc',
                    500: '#6875f5',
                    600: '#535bf0',
                    700: '#3b3fc8',
                    800: '#2c2f97',
                    900: '#1a1c63'
                },
                accent: {
                    50: '#f0fdfa',
                    100: '#ccfbf1',
                    200: '#99f6e4',
                    300: '#5eead4',
                    400: '#2dd4bf',
                    500: '#14b8a6',
                    600: '#0d9488',
                    700: '#0f766e',
                    800: '#115e59',
                    900: '#134e4a'
                }
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'card': '0 6px 18px rgba(15, 23, 42, 0.06)',
            },
            borderRadius: {
                'lg-2': '0.75rem',
            }
        },
    },

    plugins: [forms],
};
