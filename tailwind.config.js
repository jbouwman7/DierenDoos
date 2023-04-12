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
      colors: {
        'primary': '#FFBB29',
        'secondary': '#FCE055',
        'contrast': '#0898CC',
        'light': '#FAF6EE',
        'dark': '#130A0A',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
