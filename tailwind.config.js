const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    darkMode: "class",
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans]
            }
        },
        colors: {
            // Build your palette here
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            white: colors.white,
            gray: colors.trueGray,
            red: colors.red,
            blue: colors.lightBlue,
            yellow: colors.amber,
            green: colors.green,
            cyan: colors.cyan,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            "main-blue": "#454ADE",
            "main-gray": "#1B1F3B",
            "main-mavi": "#B14AED",
            "main-rose": "#C874D9",
            "main-light": "#E1BBC9"
        }
    },

    variants: {
        extend: {
            opacity: ["disabled"]
        }
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio")
    ]
};
