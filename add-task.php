<?php
require_once "bdd-crud.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $user_id = $_SESSION['user_id'] ?? null;

    if ($name && $description && $user_id) {
        // Ajout de la tâche avec l'utilisateur connecté
        $database = connect_database();
        $prepare = $database->prepare("INSERT INTO Task (name, description, user_id) VALUES (?, ?, ?)");
        if ($prepare->execute([$name, $description, $user_id])) {
           
        } else {
            $error = "Erreur lors de l'ajout de la tâche.";
        }
    } 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter une tâche</h1>
    <?php if (!empty($error)): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <!-- TODO Formulaire pour ajouter une tâche -->
     <form method="post">
        <label for="name">Nom de la tâche :</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>