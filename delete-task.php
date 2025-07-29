<?php
require_once "bdd-crud.php";

// TODO Suppréssion d'une tâche en fonction de son ID passé en $_GET

// Suppression d'une tâche en fonction de son ID passé en $_GET
if (isset($_GET['id'])) {
    $task_id = (int)$_GET['id'];
    if (delete_task($task_id)) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        echo "<p>Erreur lors de la suppression de la tâche.</p>";
    }
} else {
    echo "<p>ID de tâche non spécifié.</p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une tache</title>
</head>
<body>
    
</body>
</html>