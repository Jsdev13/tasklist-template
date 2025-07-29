<?php
session_start();
require_once "bdd-crud.php";
// TODO Redirection vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// TODO Afficher la liste des tâches de l'utilisateur connecté

$user_id = $_SESSION['user_id'];
$tasks = get_all_task_by_user($user_id);
if (!$tasks) {
    $message = "Aucune tâche trouvée.";
} else {
    $message = "Liste des tâches :";
}
// ...existing code...

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir les taches</title>
</head>
<body>
    <header>
        <a href="login.php">Login</a>
        <a href="logout.php">Logout</a>
        <a href="inscription.php">Se créer un compte</a>
    </header>
    <h1>Liste des tâches</h1>
    <div class="tasks"> 
        <!-- TODO Afficher la liste des tâches de l'utilisateur connecté -->

    </div>
</body>
</html>