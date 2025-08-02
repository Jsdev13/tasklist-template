<?php
session_start();
require_once "bdd-crud.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username && $password) {
        $user = get_user_by_username($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            $message = "Identifiants incorrects. Veuillez réessayer.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>
<body>
<div class ="imgg">
<img src="task.png" alt="Task Image" >
</div>

    <div class="login-container">
    <h1>Login</h1>
    <!-- TODO Formulaire de connexion -->
<?php if ($message): ?>
        <p style="color:red"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

<form action="" method="post">
    <label for="username">Username :</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password :</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Connect</button>
    
    <a href="inscription.php">Sign up</a>
</div>

</body>
</html>
