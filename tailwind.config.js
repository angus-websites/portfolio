const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    purge: {
        enabled: false,
        content:[
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        ]
    },

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

                blue: {
                    100: '#e5f4f8',
                    200: '#D1E8F7',
                    300: '#C7DDEC',
                    400: '#A6D4EC',
                    500: '#84CC17',
                    600: '#28596B',
                    700: '#004F64', //Secondary
                    800: '#3F6213',
                    900: '#365314',

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
    require('daisyui'),],

    daisyui: {
        themes: [
          {
            'passworld': {                       /* your theme name */
               'primary' : '#6FB44E',           /* Primary color */
               'primary-focus' : '#64A246',     /* Primary color - focused */
               'primary-content' : '#ffffff',   /* Foreground content color to use on primary color */

               'secondary' : '#004E64',         /* Secondary color */
               'secondary-focus' : '#1A4053',   /* Secondary color - focused */
               'secondary-content' : '#ffffff', /* Foreground content color to use on secondary color */
               
               'accent' : '#d35281',            /* Accent color */
               'accent-focus' : '#c74b78',      /* Accent color - focused */
               'accent-content' : '#ffffff',    /* Foreground content color to use on accent color */

               'neutral' : '#3d4451',           /* Neutral color */
               'neutral-focus' : '#2a2e37',     /* Neutral color - focused */
               'neutral-content' : '#ffffff',   /* Foreground content color to use on neutral color */

               'base-100' : '#ffffff',          /* Base color of page, used for blank backgrounds */
               'base-200' : '#F1EFE9',          /* Base color, a little darker */
               'base-300' : '#E5E4DF',          /* Base color, even more darker */
               'base-content' : '#212613',      /* Foreground content color to use on base color */

               'info' : '#2094f3',              /* Info */
               'success' : '#009485',           /* Success */
               'warning' : '#ff9900',           /* Warning */
               'error' : '#ff5724',             /* Error */
            },

          },
          "light",
        ],
      },


};
