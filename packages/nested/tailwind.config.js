const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  purge: [
    './resources/**/*.{html,php,vue,js,ts,jsx,tsx}',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        'light-blue': colors.lightBlue,
        'green': colors.green,
        'brand': '#2D3748',
        'brand-light': '#4A5568',
        'brand-dark': '#1A202C',
        'danger': '#DC2626',
        'black-75': 'rgba(0,0,0,.75)',
      },
      fontSize: {
        '2xs': ['0.625rem', 1],
      },
      spacing: {
        '30px': '1.875rem',
        '2.75': '0.688rem',
        '4.5': '1.125rem',
        '15': '3.75rem',
        '18': '4.5rem',
        '19': '4.75rem',
      },
      gridTemplateColumns: {
        'page-sidebar': '256px minmax(0, 1fr)',
      },
      inset: {
        '5px': '5px',
        '12': '12px',
        '15': '15px',
        '24': '24px',
      },
      lineHeight: {
       '14px': '0.875rem',
      },
    },
  },
  variants: {
    extend: {
      borderWidth: ['hover', 'focus', 'first', 'last'],
      margin: ['hover', 'focus', 'first', 'last'],
      display: ['hover', 'focus', 'group-hover'],
    },
  },
  plugins: [],
}
