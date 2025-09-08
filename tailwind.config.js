/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/js/**/*.vue',
  ],
  safelist: [
    // Status colors
    'bg-gray-500',
    'bg-cyan-500',
    'bg-green-500',

    // Priority colors
    'bg-blue-500',
    'bg-orange-500',
    'bg-red-500',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
