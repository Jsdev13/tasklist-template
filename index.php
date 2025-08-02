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

$user = get_user($user_id);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Voir les taches</title>
</head>
<body>
<div class="imgg">
    <img src = "todo.png" alt="Task Image">
    </div>

<div class="titletask">
    <h3>Welcome <?= htmlspecialchars($user['username']) ?></h3>
</div>
    <section>
    <h1>Task list</h1>
    <div class="tasks"> 
        <!-- TODO Afficher la liste des tâches de l'utilisateur connecté -->
 <?php if (!$tasks): ?>
            <p>No tasks found.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <strong><?= htmlspecialchars($task['name']) ?></strong> : 
                        <?= htmlspecialchars($task['description']) ?>
                        </li>

                        <div class= "look">
                        <a href="show-task.php?id=<?= $task['id'] ?>">Look</a> 
                        </div>

                        <div class="delete">
                        <a href="delete-task.php?id=<?= $task['id'] ?>">Delete</a>
                        </div>
                        
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <h2>Navigation :</h2>
    <header>
        <a href="add-task.php">Create task</a> <br>
        <a href="index.php">Task</a> <br>
        <a href="inscription.php">Create account</a> <br>
        <a href="login.php">Login</a> <br>
        <a href="logout.php">Logout</a> <br>
        
    </header>
    </section>
</body>
</html>


