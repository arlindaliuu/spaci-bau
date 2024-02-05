/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit', // Enable JIT mode
  content: [
    "./**.{php,html,js}",
    "./parts/*.{php,html,js}",
    "./components/*.{php,html,js}",
    "./templates/*.{php,html,js}",
  ],
  safelist: [
    'fixed',
    'top-0',
    'animate-fade-down',
    'animate-fade-up',
    'animate-fade-left',
    'animate-fade-right',
    'animate-shake',
    // Add any other dynamically generated classes you want to include here
  ],
  theme: {
    extend: {
      maxWidth: {
        'mdm': '1180px',
      },
      colors:{
        'blue': {
          900: '#03045e',
          800: '#023e8a',
          700: '#0077b6',
          600: '#0096c7',
          500: '#00b4d8',
          400: '#48cae4',
          300: '#90e0ef',
          200: '#ade8f4',
          100: '#caf0f8',
          50:  '#172647'
        },
        'black':{
          900:'#242424',
          800:'#162137',
          750: '#000000',
          700:'#A0A5B1',
        },
        'orange':{
          100:'#ff7523'
        },
        'gray':{
          100:'#edf1f4',
          200: '#F4F5F5',
        },
        'green':{
          900: '#008080'
        }
      }
    }
  },
  plugins: [
    require('tailwindcss-animated')
  ],
};
