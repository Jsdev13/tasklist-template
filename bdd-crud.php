<?php
/**
 * Ce fichier contient les fonctions de CRUD pour les utilisateurs et les tâches.
 * Il est utilisé pour interagir avec la base de données.
 * Presque toutes les pages de l'application utilisent ce fichier.
 * 
 * A vous de remplir ces fonction pour qu'elles fonctionnent correctement.
 * 
 * Vous pourrez ainsi facilment les utiliser dans les autres fichiers et construire votre site sans plus vous soucis du SQL.
 */

function connect_database() : PDO{
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database","root","root");
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $database;
}

// CRUD User
// Create (signin)
function create_user(string $email,string $password) : int | null {
    $database = connect_database();
    $prepare = $database->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($prepare->execute([$email,$hashed_password])) {
        $user_id = $database->lastInsertId();
    } else {
        $user_id = null; // In case of failure
    }
    // TODO
    return $user_id;
}


function get_user_by_username(string $username) : array | null {
    $database = connect_database();
    $prepare = $database->prepare("SELECT * FROM users WHERE username = ?");
    $prepare->execute([$username]);
    $user = $prepare->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;
}



// Read (login)
function get_user(int $id) : array | null {
    $database = connect_database();
    $prepare = $database->prepare("SELECT * FROM users WHERE id = ?");
    $prepare->execute([$id]);
    $user = $prepare->fetch(PDO::FETCH_ASSOC);
    // TODO 
    return $user;
}

// CRUD Task
// Create

// Fonction pour ajouter une tâche à la base de données
// Elle prend en paramètre : le nom et la description de la tâche (tous deux de type string)
// Elle retourne l'ID (int) de la tâche ajoutée ou null en cas d'échec
function add_task(string $name, string $description, int $user_id): int | null {

    // Connexion à la base de données via une fonction (à définir ailleurs)
    $database = connect_database();

    // Préparation d'une requête SQL pour insérer une nouvelle tâche
    $prepare = $database->prepare("INSERT INTO tasks (username, password, user_id) VALUES (? ,?, ?)");

    // Exécution de la requête avec les valeurs de nom et description
    $prepare->execute([$name, $description, $user_id]);

    // Récupération de l'ID de la dernière tâche insérée
    $task_id = $database->lastInsertId();

    // Si aucun ID n'est retourné, cela signifie que l'insertion a échoué
    if (!$task_id) {
        return null; // On retourne null en cas d'erreur
    }

    // TODO : ici on pourrait ajouter du code complémentaire (ex: log, envoi de mail, etc.)

    // Retourne l'identifiant de la tâche insérée
    return $task_id;
}


//Read
function get_task(int $id) : array | null {
    $database = connect_database();
    $prepare = $database->prepare("SELECT * FROM tasks WHERE id = ?");
    $prepare->execute([$id]);
    $task = $prepare->fetch(PDO::FETCH_ASSOC);
    if (!$task) {
        return null; // No task found
    }
    // TODO
    return $task;
}


function get_all_task_by_user(int $user_id) : array | null {
    $database = connect_database();
    $prepare = $database->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $prepare->execute([$user_id]);
    $tasks = $prepare->fetchAll(PDO::FETCH_ASSOC);
    return $tasks ?: null;

}

// Delete (BONUS)

function delete_task(int $id) : bool{
    $database = connect_database();
    $prepare = $database->prepare("DELETE FROM tasks WHERE id = ?");
    $isSuccessful = $prepare->execute([$id]); 
    if (!$isSuccessful) {
        return false; // Deletion failed
    }
    return $isSuccessful;
}


