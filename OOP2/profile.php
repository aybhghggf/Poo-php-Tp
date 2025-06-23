<?php
include_once 'nav.php';
require_once 'user.class.php';
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">👤 User Profile</h2>

        <!-- Current Profile Picture -->
        <?php
        if ($user->getAvatar() == "Annonyme") { ?>
            <div class="flex items-center gap-4 mb-6">
                <div class="text-gray-700 font-medium">Photo actuelle:</div>
                <img id="currentAvatar" src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="w-16 h-16 rounded-full border">
            </div>
        <?php } elseif ($user->getAvatar() == "Avatar1") { ?>
            <div class="flex items-center gap-4 mb-6">
                <div class="text-gray-700 font-medium">Photo actuelle:</div>
                <img id="currentAvatar" src="https://i.pravatar.cc/100?img=1" alt="Avatar" class="w-16 h-16 rounded-full border">
            </div>
        <?php } elseif ($user->getAvatar() == "Avatar2") { ?>
            <div class="flex items-center gap-4 mb-6">
                <div class="text-gray-700 font-medium">Photo actuelle:</div>
                <img id="currentAvatar" src="https://i.pravatar.cc/100?img=2" alt="Avatar" class="w-16 h-16 rounded-full border">
            </div>
        <?php } elseif ($user->getAvatar() == "Avatar3") { ?>
            <div class="flex items-center gap-4 mb-6">
                <div class="text-gray-700 font-medium">Photo actuelle:</div>
                <img id="currentAvatar" src="https://i.pravatar.cc/100?img=3" alt="Avatar" class="w-16 h-16 rounded-full border">
            </div>
        <?php } else { ?>
            <div class="flex items-center gap-4 mb-6">
                <div class="text-gray-700 font-medium">Photo actuelle:</div>
                <img id="currentAvatar" src="<?php echo $user->getAvatar(); ?>" alt="Avatar" class="w-16 h-16 rounded-full border">
            </div>
        <?php } ?>
        <form id="profileForm" class="space-y-5" action="updateprofile.php" method="POST">
            <!-- Name fields -->
            <div>
                <label class="block text-gray-700 mb-1" for="nom">Nom</label>
                <input name="nom" type="text" id="nom" class="w-full border rounded-xl px-4 py-2" value="<?php echo $user->getName(); ?> ">
            </div>

            <div>
                <label class="block text-gray-700 mb-1" for="prenom">Prénom</label>
                <input name="prenom" type="text" id="prenom" class="w-full border rounded-xl px-4 py-2" value="<?php echo $user->getPrenom(); ?>">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 mb-1" for="email">Email</label>
                <input name="email" type="email" id="email" class="w-full border rounded-xl px-4 py-2" value="<?php echo $user->getEmail(); ?>">
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700 mb-1" for="phone">Téléphone</label>
                <input name="phone" type="tel" id="phone" class="w-full border rounded-xl px-4 py-2" value="<?php echo $user->getPhone(); ?>">
            </div>
            <!-- Phone -->
            <div>
                <label class="block text-gray-700 mb-1" for="password">Password</label>
                <input name="password" type="password" id="phone" class="w-full border rounded-xl px-4 py-2" placeholder="Nouveau mot de passe">
            </div>

            <!-- Profile Picture Selection -->
            <div>
                <label class="block text-gray-700 mb-2">Choisir une photo de profil</label>
                <div class="grid grid-cols-4 gap-4">

                    <!-- Avatar Anonyme -->
                    <label class="flex flex-col items-center p-2 border rounded-xl cursor-pointer hover:bg-gray-100">
                        <input type="radio" name="avatar" value="Annonyme" class="hidden" checked>
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="w-14 h-14 rounded-full border">
                        <span class="text-sm mt-1">Anonyme</span>
                    </label>

                    <!-- Avatar 1 -->
                    <label class="flex flex-col items-center p-2 border rounded-xl cursor-pointer hover:bg-gray-100">
                        <input type="radio" name="avatar" value="Avatar1" class="hidden">
                        <img src="https://i.pravatar.cc/100?img=1" class="w-14 h-14 rounded-full border">
                        <span class="text-sm mt-1">Avatar 1</span>
                    </label>

                    <!-- Avatar 2 -->
                    <label class="flex flex-col items-center p-2 border rounded-xl cursor-pointer hover:bg-gray-100">
                        <input type="radio" name="avatar" value="Avatar2" class="hidden">
                        <img src="https://i.pravatar.cc/100?img=2" class="w-14 h-14 rounded-full border">
                        <span class="text-sm mt-1">Avatar 2</span>
                    </label>

                    <!-- Avatar 3 -->
                    <label class="flex flex-col items-center p-2 border rounded-xl cursor-pointer hover:bg-gray-100">
                        <input type="radio" name="avatar" value="Avatar3" class="hidden">
                        <img src="https://i.pravatar.cc/100?img=3" class="w-14 h-14 rounded-full border">
                        <span class="text-sm mt-1">Avatar 3</span>
                    </label>
                </div>
            </div>


            <!-- Submit Button -->
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">Enregistrer les modifications</button>
        </form>

        <!-- Success message -->
        <p id="successMsg" class="mt-4 text-green-600 font-medium hidden">✅ Modifications enregistrées !</p>
    </div>

    <script>
        // Change current avatar preview on selection
        const avatarRadios = document.querySelectorAll('input[name="avatar"]');
        const currentAvatar = document.getElementById("currentAvatar");

        avatarRadios.forEach(radio => {
            radio.addEventListener("change", () => {
                currentAvatar.src = radio.value;
            });
        });
    </script>
</body>

</html>