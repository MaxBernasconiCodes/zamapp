const { fontWeight } = require('tailwindcss/defaultTheme');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                montserrat: ['Montserrat', ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto', ...defaultTheme.fontFamily.sans]
            },
            colors: {
                zam:
                {
                    green: '#B9CE26',
                    white: '#FFFFFF',
                    light: '#FCFCFC',
                    gray: '#9E9E9E',
                    dark: '#707070',
                    alert: '#FBBF24',
                    danger: '#DC2626',
                },
            },
        },

    },

    variants: {
        extend: {
            opacity: ['disabled'],
            fontWeight: ['active'],
            backgroundColor: ['active'],
            backgroundColor: ['checked'],
            backgroundColor: ['even'],
            backgroundColor: ['odd'],
            textColor: ['odd'],
            borderColor: ['checked'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
