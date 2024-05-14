/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./resources/views/**/*.vue",
        // Vous pouvez ajouter d'autres chemins ici si nécessaire
    ],
    theme: {
        extend: {
            colors: {
                myCustomColor: '#007bff', // Your custom color value
            },
        },
    },
    
    plugins: [],
};
