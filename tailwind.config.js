/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.twig"],
  theme: {
    colors: {
      'navbar': '#FFBB29',
      'catdivs': '#FCE055',
      'black': 'black',
      'white': 'white',
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
