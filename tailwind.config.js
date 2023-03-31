/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.twig"],
  theme: {
    colors: {
      'primary': '#FFBB29',
      'secondary': '#FCE055',
      'light': '#FAF6EE',
    },
    container: {
      center: true,
    },
    extend: {
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
