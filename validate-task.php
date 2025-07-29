<?php
require_once "bdd-crud.php";
// BONUS Valider une tache dans la BDD et redirection vers la page d'accueil
if (isset($_GET['id'])) {
    $task_id = (int)$_GET['id'];
    if (validate_task($task_id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Erreur lors de la validation de la tâche.</p>";
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
    <title>validate Task</title>
</head>
<body>
    
</body>
</html>