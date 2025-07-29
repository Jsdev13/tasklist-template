<?php
require_once "bdd-crud.php";
session_start();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $user_id = create_user($username, $password);
        if ($user_id) {
            $_SESSION['user_id'] = $user_id;
            header("Location: index.php");
            exit();
        } else {
            $message = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <h1>INSCRIPTION :</h1>
   <!-- TODO Formulaire pour s'inscrire (créer un utilisateur) -->

    <form action="" method = "post">
        <label for="username">Prenom:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <br>
        <button>S'inscrire</button>
        <?php if ($message): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

    </form>
</body>

</html>