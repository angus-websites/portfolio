const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    content:[
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        screens: {
          'xxs': '375px',
          'xs': '475px',
          ...defaultTheme.screens,
        },

        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                white:{
                    DEFAULT: "#FFFFFF",
                    50: "#FBFBFB"
                },

                teal: {
                    100: '#E4FFF7',
                    200: '#C9ECE2',
                    300: '#9DD1C2',
                    400: '#5CB69C',
                    500: '#139E76',
                    600: '#188868',
                    700: '#1E7059',
                    800: '#195C49',
                    900: '#154638',

                },

                violet: {
                    100: '#EDE9FE',
                    200: '#CBC1E2',
                    300: '#A090C4',
                    400: '#7E6CA6',
                    500: '#64547E',
                    600: '#55486A',
                    700: '#4D3F65',
                    800: '#433757',
                    900: '#382E48',

                },

                pink: {
                    100: '#F5DDE9',
                    200: '#ECC0D6',
                    300: '#DF96BC',
                    400: '#CB5692',
                    500: '#BE2C77',
                    600: '#B32971',
                    700: '#A7266B',
                    800: '#982363',
                    900: '#821E55',

                },


                golden: {
                    light: "#ddd7c1",
                    DEFAULT: "#918654",
                    dark: "#625b31",
                    darker: "#222515",
                }
            },
            boxShadow: {
                ps: 'rgba(50, 50, 93, 0.25) 0px 0px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px',
            },
            animation: {
                'reverse-spin': 'reverse-spin 1s linear infinite'
            },
            keyframes: {
                'reverse-spin': {
                    from: {
                        transform: 'rotate(360deg)'
                    },
            }
            }
        },

    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'), 
    require("daisyui"),
    ],
    daisyui: {
        themes: [
          {
            'portfolio': {                       /* your theme name */
               'primary' : '#139E76',           /* Primary color */
               'primary-focus' : '#25866A',     /* Primary color - focused */
               'primary-content' : '#ffffff',   /* Foreground content color to use on primary color */

               'secondary' : '#64547E',         /* Secondary color */
               'secondary-focus' : '#4E3C6C',   /* Secondary color - focused */
               'secondary-content' : '#ffffff', /* Foreground content color to use on secondary color */

               'accent' : '#BE2C77',            /* Accent color */
               'accent-focus' : '#A21B61',      /* Accent color - focused */
               'accent-content' : '#ffffff',    /* Foreground content color to use on accent color */

               'neutral' : '#E8E1CC',           /* Neutral color */
               'neutral-focus' : '#E1D8BC',     /* Neutral color - focused */
               'neutral-content' : '#7B704E',   /* Foreground content color to use on neutral color */

               'base-100' : '#FFFCF3',          /* Base color of page, used for blank backgrounds */
               'base-200' : '#F1EFE9',          /* Base color, a little darker */
               'base-300' : '#ECE9E1',          /* Base color, even more darker */
               'base-content' : '#4D4B45',      /* Foreground content color to use on base color */

               'info' : '#5071D2',              /* Info */
               'info-content' : '#FFFFFF', 
               'success' : '#3EAF42',           /* Success */
               'success-content' : '#FFFFFF', 
               'warning' : '#EEBD13',           /* Warning */
               'warning-content' : '#7B6519',
               'error' : '#C23541',             /* Error */
               'error-content' : '#FFFFFF',
            },

          },
          "light",
        ],
    },


};
