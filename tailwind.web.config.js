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
        'blue': '#164194',
        'anthrazit': '#828282',
        'silver': '#c8c8c8',
      },

      fontFamily: {
        regular: ['DINRegular', ...defaultTheme.fontFamily.sans],
        light: ['DINLight', ...defaultTheme.fontFamily.sans],
      },
      
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};