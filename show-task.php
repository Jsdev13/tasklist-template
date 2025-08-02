<?php
require_once "bdd-crud.php";
// BONUS Afficher les détails d'une tâche spécifique en fonction de son ID passé en $_GET
// Initialise une variable pour stocker la tâche (au départ vide)
$task = null;

// Initialise une variable pour un éventuel message d'erreur
$message = "";

// Vérifie si un identifiant de tâche est passé via l'URL (GET)
if (isset($_GET['id'])) {

    // Convertit cet identifiant en entier pour éviter toute injection ou erreur de type
    $task_id = (int)$_GET['id'];

    // Appelle une fonction pour récupérer les informations de la tâche à partir de son ID
    $task = get_task($task_id);

    // Si aucune tâche n’est trouvée, on prépare un message à afficher
    if (!$task) {
        $message = "Aucune tâche trouvée avec cet ID.";
    }
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Task detail</title>
</head>

<body>
    <section>
    <h1>Task detail</h1>
    <header>
        <div class="taskdetail">
            <br>
<?php if ($message): ?>
    </div>
        <p><?= $message ?></p>
        
    <?php elseif ($task): ?>
        <p><strong>Nom :</strong> <?= htmlspecialchars($task['name']) ?> </p>
        <p><strong>Description :</strong> <?= htmlspecialchars($task['description']) ?></p>
    <?php endif; ?>

</section>

<div class="exit">
        <a href="logout.php">Logout</a> <br>
        <a href="add-task.php">Add task</a> <br>
        <a href="index.php">Return task</a> 

</div>
</body>
</html>