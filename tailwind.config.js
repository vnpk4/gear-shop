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
                background: '#131313',
                surface: '#131313',
                'surface-bright': '#393939',
                'surface-dim': '#131313',
                'surface-container': '#201f1f',
                'surface-container-low': '#1c1b1b',
                'surface-container-high': '#2a2a2a',
                'surface-container-highest': '#353534',
                'surface-container-lowest': '#0e0e0e',
                'on-background': '#e5e2e1',
                'on-surface': '#e5e2e1',
                'on-surface-variant': '#bbc9cf',
                'surface-variant': '#353534',
                primary: '#a4e6ff',
                'on-primary': '#003543',
                'primary-container': '#00d1ff',
                'on-primary-container': '#00566a',
                secondary: '#dab9ff',
                'on-secondary': '#460283',
                'secondary-container': '#602b9d',
                'on-secondary-container': '#cfa7ff',
                tertiary: '#00fca1',
                'on-tertiary': '#003920',
                'tertiary-container': '#00dc8c',
                'on-tertiary-container': '#005b37',
                error: '#ffb4ab',
                'on-error': '#690005',
                'error-container': '#93000a',
                'on-error-container': '#ffdad6',
                outline: '#859399',
                'outline-variant': '#3c494e',
                'surface-tint': '#4cd6ff',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sora: ['Sora', 'sans-serif'],
                inter: ['Inter', 'sans-serif'],
                jetbrains: ['JetBrains Mono', 'monospace'],
            },
            spacing: {
                'stack-sm': '12px',
                'stack-md': '24px',
                'stack-lg': '48px',
                'stack-xs': '4px',
                gutter: '24px',
                'margin-desktop': '64px',
                'margin-mobile': '20px',
            },
            borderRadius: {
                DEFAULT: '0.125rem',
                lg: '0.25rem',
                xl: '0.5rem',
                full: '0.75rem',
            },
        },
    },

    plugins: [forms],
};
