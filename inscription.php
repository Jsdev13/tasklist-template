<?php
require_once "bdd-crud.php";
// Démarre une session PHP pour pouvoir utiliser les variables de session
session_start();

// Initialise une variable pour stocker un éventuel message d'erreur ou d'information
$message = "";

// Vérifie si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupère les données envoyées par le formulaire (ou une chaîne vide si non définies)
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérifie que les deux champs sont remplis
    if ($username && $password) {

        // Appelle une fonction (que tu dois avoir définie ailleurs) pour créer l'utilisateur
        $user_id = create_user($username, $password);

        if ($user_id) {
            // Si l'utilisateur est bien créé, on stocke son identifiant en session
            $_SESSION['user_id'] = $user_id;

            // Puis on redirige vers la page d'accueil
            header("Location: index.php");
            exit(); // On stoppe l'exécution du script après la redirection
        } else {
            // Si la création de l'utilisateur échoue, on stocke un message d'erreur
            $message = "Erreur lors de l'inscription. Veuillez réessayer.";
        }

    } else {
        // Si un champ est vide, on informe l'utilisateur
        $message = "Veuillez remplir tous les champs.";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SIGN UP</title>
</head>

<body>
    <div class="imgg">
        <img src= "sign.png" alt="Task Image">
    </div>
    
   <!-- TODO Formulaire pour s'inscrire (créer un utilisateur) -->
<div class="login-container">
    
    <p>Create an account to start using the app.</p>

    <form action="" method = "post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button>Sign up</button>
        <?php if ($message): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

    </form>

    </div>
</body>

</html>