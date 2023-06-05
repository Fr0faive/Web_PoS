/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                'bg-login': "url('/public/images/bg.jpg')",
                'dashboard': "url('/public/images/bg-dash1.jpg')",
              }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

