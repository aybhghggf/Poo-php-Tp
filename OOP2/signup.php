<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="register.php" method="post" class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="nom">Nom</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="nom" name="nom" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="prenom">Prénom</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="prenom" name="prenom" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="email">Email</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" id="email" name="email" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="telephone">Téléphone</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" type="tel" id="telephone" name="telephone" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 mb-2" for="password">Mot de passe</label>
            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">S'inscrire</button>
    </form>
</body>
</html>