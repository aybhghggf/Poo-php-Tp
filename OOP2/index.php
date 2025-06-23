<?php
session_start();
require_once 'user.class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 font-sans">
    <nav class="flex items-center justify-between bg-gray-900 px-8 py-3">
        <div class="text-white text-2xl font-bold tracking-wider">Test</div>
        <?php 
           if(isset($_SESSION['user'])) {
        ?>
           <div class="flex gap-4">
            <a href="logout.php" class="text-white px-4 py-2 rounded hover:bg-gray-700 transition">Logout</a>
        </div>
        <?php
           } else {
        ?>
         <div class="flex gap-4">
            <a href="signup.php" class="text-white px-4 py-2 rounded hover:bg-gray-700 transition">Sign Up</a>
            <a href="login.php" class="text-white px-4 py-2 rounded hover:bg-gray-700 transition">Login</a>
        </div>
        <?php
           }
        ?>
    </nav>

    <div class="p-8">
        <?php
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            // Adjust output as needed
            echo '<pre>' . htmlspecialchars(print_r($user, true)) . '</pre>';
        }
        ?>
    </div>
</body>

</html>