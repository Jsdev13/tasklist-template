<?php
require_once "bdd-crud.php";
// BONUS Afficher les détails d'une tâche spécifique en fonction de son ID passé en $_GET
$task = null;
$message = "";
if (isset($_GET['id'])) {
    $task_id = (int)$_GET['id'];
    $task = get_task($task_id);
    if (!$task) {
        $message = "Aucune tâche trouvée avec cet ID.";
    } else {
        $message = "Détails de la tâche :";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de la tâche</title>
</head>
<body>
    <h1>Détail de la tâche</h1>
    <?php if ($message): ?>
        <p><?= $message ?></p>
    <?php elseif ($task): ?>
        <p><strong>Nom :</strong> <?= htmlspecialchars($task['name']) ?></p>
        <p><strong>Description :</strong> <?= htmlspecialchars($task['description']) ?></p>
    <?php endif; ?>
    <a href="index.php">Retour à la liste</a>
</body>
</html>