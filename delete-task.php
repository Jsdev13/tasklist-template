<?php
require_once "bdd-crud.php";

// TODO Suppréssion d'une tâche en fonction de son ID passé en $_GET

// Suppression d'une tâche en fonction de son ID passé en $_GET
// Vérifie si un identifiant de tâche a été passé en paramètre dans l'URL via la méthode GET
if (isset($_GET['id'])) {
    
    // Convertit l'identifiant reçu en entier pour des raisons de sécurité (évite les injections ou les valeurs non valides)
    $task_id = (int)$_GET['id'];
    
    // Appelle la fonction delete_task() pour tenter de supprimer la tâche correspondante
    if (delete_task($task_id)) {
        
        // Si la suppression réussit, redirige l'utilisateur vers la page d'accueil (index.php)
        header("Location: index.php");
        exit(); // Termine le script après la redirection pour éviter toute exécution supplémentaire
    } else {
        // Si la suppression échoue, affiche un message d'erreur à l'utilisateur
        echo "<p>Erreur lors de la suppression de la tâche.</p>";
    }
    
} else {
    // Si aucun identifiant de tâche n'a été fourni dans l'URL, affiche un message d'erreur
    echo "<p>ID de tâche non spécifié.</p>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Supprimer une tache</title>

</head>
<body>
    
</body>
</html>