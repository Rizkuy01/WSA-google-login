<?php
require_once 'config.php';

$login_url = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login with Google</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @layer utilities {
        @keyframes gradientMove {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradientMove 15s ease infinite;
        }
    }
    @keyframes fadeUp {
    0% {
        opacity: 0;
        transform: translateY(40px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
    }

    .animate-fade-up {
    animation: fadeUp 0.8s ease-out forwards;
    }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black animate-gradient min-h-screen flex flex-col items-center justify-center font-sans relative">

    <!-- Header -->
    <div class="text-center mb-8 space-y-2">
        <h1 id="typingTitle" class="text-3xl font-bold text-white"></h1>
        <p id="typingSubtitle" class="text-lg text-gray-300"></p>
    </div>



    <!-- Login Card -->
    <div class="bg-white shadow-lg rounded-2xl p-10 max-w-sm text-center space-y-6 animate-fade-up">
        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" class="mx-auto w-16">
        <h2 class="text-2xl font-bold text-gray-800">
            Sign in with Google
        </h2>
        <p class="text-gray-500 text-sm">
            Access your account securely using your Google credentials
        </p>
        <a href="<?= htmlspecialchars($login_url) ?>" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow-md hover:bg-blue-700 transition-all">
            <svg class="w-5 h-5" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                <path fill="#4285F4" d="M533.5 278.4c0-17.4-1.6-34.1-4.7-50.4H272v95.4h147.2c-6.4 34.6-25.4 63.7-54.2 83.2v68.9h87.7c51.4-47.3 80.8-117 80.8-197.1z"/>
                <path fill="#34A853" d="M272 544.3c73.5 0 135.1-24.3 180.2-65.7l-87.7-68.9c-24.4 16.3-55.7 25.8-92.5 25.8-71.1 0-131.4-48-153-112.6H30.3v70.7C74.8 475 166.5 544.3 272 544.3z"/>
                <path fill="#FBBC05" d="M119 323.6c-10.2-30.1-10.2-62.4 0-92.5V160.4H30.3C-10.1 236.3-10.1 347.5 30.3 423.4l88.7-69.8z"/>
                <path fill="#EA4335" d="M272 107.7c39.9-.6 78.2 14.1 107.4 41.3l80.4-80.4C412.9 24.6 343.8-1.3 272 0 166.5 0 74.8 69.3 30.3 160.4l88.7 70.7C140.6 155.7 200.9 107.7 272 107.7z"/>
            </svg>
            Login with Google   
        </a>
    </div>

    <!-- Footer -->
    <footer class="absolute bottom-4 text-white text-xs text-center">
        <p>&copy;2210631250021</p>
    </footer>

    <script>
    function typeText(elementId, text, speed, callback) {
        let i = 0;
        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            } else if (callback) {
                callback();
            }
        }
        type();
    }
    window.addEventListener('DOMContentLoaded', () => {
        typeText("typingTitle", "Mid Term Exam", 100, () => {
            typeText("typingSubtitle", "Web Service Application", 60);
        });
    });
    </script>

</body>
</html>
