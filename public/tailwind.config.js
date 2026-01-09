export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#297d53',
                    dark: '#1f6342',
                },
                secondary: '#435a52',
                accent: {
                    DEFAULT: '#e6d54f',
                    dark: '#d4c33e',
                },
                heading: '#435a52',
                body: '#494a4d',
                'top-bar': '#f7f0ea',
                'top-bar-text': '#798883',
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
                outfit: ['Outfit', 'sans-serif'],
                nunito: ['Nunito', 'sans-serif'],
            },
            container: {
                center: true,
                padding: '1rem',
            },
        },
    },
    plugins: [],
}
