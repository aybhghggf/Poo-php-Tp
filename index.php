<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Navbar Auth - Tailwind</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    
    <!-- Logo -->
    <a href="#" class="flex items-center space-x-2">
      <img src="logo.png" alt="Logo" class="h-10 w-10">
      <span class="text-xl font-bold text-gray-800">MyWebsite</span>
    </a>

    <!-- Links -->
    <div class="space-x-4">
      <a href="login.php" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
      <a href="register.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Sign Up</a>
    </div>
  </div>
</nav>

</body>
</html>
