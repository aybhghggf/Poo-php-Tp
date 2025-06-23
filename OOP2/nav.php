<?php
require_once 'user.class.php';

session_start();
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
        <div class="relative group">
            <button class="flex items-center text-white px-4 py-2 rounded hover:bg-gray-700 transition focus:outline-none">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <?php echo htmlspecialchars($_SESSION['user']->Nom ?? 'Profile'); ?>
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
            </button>
            <div class="absolute right-0 mt-2 w-40 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 group-focus:opacity-100 transition-opacity z-10">
            <a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
            <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
            </div>
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
</body>

</html>