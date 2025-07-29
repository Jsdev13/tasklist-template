<?php
// TODO Destruction de la session pour déconnecter l'utilisateur et redirection vers la page de connexion

session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disconnect</title>
</head>
<body>
    
</body>
</html>