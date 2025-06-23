<?php
require_once 'user.class.php';
if(isset( $_POST['submit'])){
    $Nom = $_POST['nom'];
    $Prenom = $_POST['prenom'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $hasehd_password= md5($Password);
    $phone = $_POST['phone'];
    User::create( $Nom, $Prenom,$phone,$Email, $hasehd_password);
    header("location:login.php?msg=1");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Créer un compte</h2>

    <form action="register.php" method="POST" class="space-y-4">
      <div>
        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
        <input type="text" name="nom" id="nom" required class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
        <input type="text" name="prenom" id="prenom" required class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" required class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
        <input type="tel" name="phone" id="phone" required class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" name="password" id="password" required class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition" name="submit">
        S'inscrire
      </button>
    </form>
  </div>
</div>

</body>
</html>
