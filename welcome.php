<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
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

            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.4s ease forwards;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-900 via-purple-800 to-pink-900 animate-gradient min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-lg rounded-2xl p-10 max-w-md w-full text-center space-y-6 animate-fade-in">
        <!-- Header -->
        <div class="space-y-2">
            <h1 id="typingTitle" class="text-3xl font-bold text-indigo-800"></h1>
            <p id="typingSubtitle" class="text-lg text-gray-600"></p>
        </div>

        <!-- User info -->
        <img src="<?= htmlspecialchars($user['picture']) ?>" alt="Profile Picture" class="mx-auto w-20 h-20 rounded-full border-4 border-indigo-500 shadow-md">
        <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($user['name']) ?></h2>
        <p class="text-gray-500"><?= htmlspecialchars($user['email']) ?></p>

        <a href="logout.php" class="inline-block mt-4 px-6 py-3 bg-red-600 text-white font-semibold rounded-xl shadow-md hover:bg-red-700 transition-all">
            Logout
        </a>

        <!-- Footer -->
        <div class="text-xs text-gray-400 flex items-center justify-center gap-1 pt-6">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0C4.477 0 0 4.477 0 10a10 10 0 1010-10zM8 15v-1h4v1H8zm0-2v-5h4v5H8z" />
            </svg>
            <span>2210631250021</span>
        </div>
    </div>

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
            typeText("typingTitle", "Welcome to Dashboard", 90, () => {
                typeText("typingSubtitle", "You have successfully logged in", 60);
            });
        });
    </script>
</body>
</html>
