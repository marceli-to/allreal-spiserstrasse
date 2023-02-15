/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      
      colors: {
        'primary': {
          '50': '#eef7ff',
          '100': '#d8edff',
          '200': '#bae0ff',
          '300': '#8bcfff',
          '400': '#54b2ff',
          '500': '#2d90ff',
          '600': '#1670fa',
          '700': '#0f59e6',
          '800': '#1348ba',
          '900': '#164194',
        },
      },

      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
        mono: ['IBM Plex Mono', ...defaultTheme.fontFamily.mono],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};