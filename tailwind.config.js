/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.twig"],
  theme: {
    container: {
      center: true,
    },
    extend: {
      colors: {
        'primary': '#FFBB29',
        'secondary': '#FCE055',
        'contrast': '#0898CC',
        'contrast-hover': '#0586b5',
        'light': '#FAF6EE',
        'dark': '#130A0A',
      },
    },
  },
  plugins: [],
}
