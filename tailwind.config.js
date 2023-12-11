/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./public/asset/js/*.js",
    "./app/View/Components/*.php"
  ],
  theme: {
    extend: {
        fontFamily : {
            primary: "Roboto, sans-serif"
        },
        keyframes : {
            widthExpand : {
                '0%' : {'max-width': '0'},
                '100%' : {'max-width' : '300px'}
            },
            fadeIn : {
                '0%' : {'opacity' : '0'},
                '100%' : {'opacity' : '1'}
            }
        },
        animation : {
            widthExpand : 'widthExpand 0.4s',
            fadeIn : 'fadeIn 1s',
        }
    },
  },
  plugins: [],
}

