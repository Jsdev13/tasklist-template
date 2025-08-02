<?php
require_once "bdd-crud.php";

// Démarre une session PHP (nécessaire pour accéder aux variables de session comme 'user_id')
session_start();

// Vérifie si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupère les champs 'name' et 'description' du formulaire. 
    // Utilise l'opérateur null coalescent (??) pour éviter les erreurs si les champs ne sont pas définis.
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    // Récupère l'identifiant de l'utilisateur à partir de la session
    $user_id = $_SESSION['user_id'] ?? null;

    // Vérifie que les champs obligatoires sont bien remplis
    if ($name && $description && $user_id) {
        
        // Connexion à la base de données (assure-toi que la fonction connect_database() existe)
        $database = connect_database();

        // Prépare une requête SQL pour insérer une nouvelle tâche (évite les injections SQL)
        $prepare = $database->prepare("INSERT INTO tasks (name, description, user_id) VALUES (?, ?, ?)");

        // Exécute la requête avec les valeurs récupérées du formulaire et de la session
        if ($prepare->execute([$name, $description, $user_id])) {
            // Tu peux éventuellement ajouter ici une redirection ou un message de succès
        } else {
            // En cas d’échec de l’insertion dans la base, on définit un message d’erreur
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
    <link rel="stylesheet" href="style.css">
    <title>ADD TASK</title>
</head>
<div class="imgg">
<img src = "addtask.png" alt="Task Image">
</div>
<body>
    <h1>ADD TASK</h1>
    <?php if (!empty($error)): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <!-- TODO Formulaire pour ajouter une tâche -->

<div class="titletask">
    
     <form method="post">
        <label for="name">Task name :</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">Add</button>
    </form>

</div>

    <section>
 <header>
 <h2>NAVIGATION :</h2>
        <a href="index.php">Look my task</a> <br>
        <a href="logout.php">Logout</a> <br>
        <a href="delete-task.php">Delete task</a> <br>
        <a href="show-task.php">Look one task</a> <br>
    </header>
</section>
  
</body>
</html>