<?php
// Chemin vers le fichier favicon.ico
$favicon = __DIR__ . '/assets/favicon.ico';

if (file_exists($favicon)) {
    // Définir le bon header
    header('Content-Type: image/x-icon');
    // Définir la taille pour la mise en cache (optionnel)
    header('Cache-Control: max-age=86400');

    // Lire et envoyer le fichier favicon.ico
    readfile($favicon);
    exit;
} else {
    // Fichier non trouvé
    header("HTTP/1.0 404 Not Found");
    echo "Favicon not found.";
    exit;
}
?>
