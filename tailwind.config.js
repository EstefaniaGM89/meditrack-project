/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    extend: {
      animation: {
        wiggle: 'wiggle 1.2s ease-in-out infinite',
        heartbeat: 'heartbeat 1.5s ease-in-out infinite',
      },
      keyframes: {
        wiggle: {
          '0%, 100%': { transform: 'rotate(-10deg)' },
          '50%': { transform: 'rotate(10deg)' },
        },
        heartbeat: {
          '0%, 100%': { transform: 'scale(1)' },
          '14%': { transform: 'scale(1.3)' },
          '28%': { transform: 'scale(1)' },
          '42%': { transform: 'scale(1.3)' },
          '70%': { transform: 'scale(1)' },
        },
      },
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}
