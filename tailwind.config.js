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

                primarylight:{
                    100: "#CCECDD",
                    200: "#C1E0D2",
                    300: "#087441",

                },

                secondarylight:{
                    100: "#D3D7EC",
                    200: "#C7CBE0",
                    300: "#373E69",

                },

                accentlight:{
                    100: "#F3D2EB",
                    200: "#E9CCE2",
                    300: "#740853",

                },

                successbright:{
                    DEFAULT: "#03C400",
                },

                infobright:{
                    DEFAULT: "#1B7AC8",
                },

                warningbright:{
                    DEFAULT: "#9D6B0F",
                },

                errorbright:{
                    DEFAULT: "#DF2F24",
                },






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
               'primary' : '#09864B',           /* Primary color */
               'primary-focus' : '#077340',     /* Primary color - focused */
               'primary-content' : '#ffffff',   /* Foreground content color to use on primary color */

               'secondary' : '#434C80',         /* Secondary color */
               'secondary-focus' : '#353D68',   /* Secondary color - focused */
               'secondary-content' : '#ffffff', /* Foreground content color to use on secondary color */

               'accent' : '#961277',            /* Accent color */
               'accent-focus' : '#841269',      /* Accent color - focused */
               'accent-content' : '#ffffff',    /* Foreground content color to use on accent color */

               'neutral' : '#515151',           /* Neutral color */
               'neutral-focus' : '#424242',     /* Neutral color - focused */
               'neutral-content' : '#FFFFFF',   /* Foreground content color to use on neutral color */

               'base-100' : '#FFFFFF',          /* Base color of page, used for blank backgrounds */
               'base-200' : '#F9F9F9',          /* Base color, a little darker */
               'base-300' : '#F0F0F0',          /* Base color, even more darker */
               'base-content' : '#4D4D4D',      /* Foreground content color to use on base color */

               'info' : '#DAEAF6',              /* Info */
               'info-content' : '#004278', 
               'success' : '#DEF2DD',           /* Success */
               'success-content' : '#026300', 
               'warning' : '#FFE898',           /* Warning */
               'warning-content' : '#6E4700',
               'error' : '#F7D4D2',             /* Error */
               'error-content' : '#7E342F',
            },

          },
          "light",
        ],
    },


};
