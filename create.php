<?php
include("mydb.php");
include('session.php');

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST["phone"];
$address = $_POST["address"];

// Reset des valeurs contenues dans la session
session_unset();
// Stockage des variables utilisateur pour les sauvegarder et les réafficher
$_SESSION['values'] = ['name' => $name, 'email' => $email, 'password' => $password, 'phone'=> $phone,'address'=> $address];

// Création d'un tableau des erreurs
$_SESSION['errors'] = [];

if (empty($name)) {
    $_SESSION['errors'][] = 'Nom invalide';
}

if (empty($address)) {
    $_SESSION['errors'][] = 'Adresse invalide';
}

if (empty($password)) {
    $_SESSION['errors'][] = 'Mot de passe invalide';
}

// Vérification de l'email
$re = '/[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/m';
preg_match_all($re, $email, $matches, PREG_SET_ORDER, 0);
if (empty($email) || count($matches) == 0) {
    $_SESSION['errors'][] = 'Email non valide';
}

// Vérification du numéro de téléphone
$re = '/\d{10}/m';
preg_match_all($re, $phone, $matches, PREG_SET_ORDER, 0);
if (empty($email) || count($matches) == 0) {
    $_SESSION['errors'][] = 'Téléphone invalide ';   
}

// Si aucune erreur n'est détectée, procéder à l'insertion dans la base de données
if(count($_SESSION['errors']) == 0){
    // Vérification si l'utilisateur existe déjà
    $result = $mysqli->query("SELECT * FROM  users WHERE username = '$name' or email = '$email'");
    if ($result->num_rows <= 0) {
        // Requête d'insertion
        $requete = "INSERT INTO users(username, address, email, password, phone) VALUES ('".$name."','".$address."','".$email."','".$password."','".$phone."')";
        // Exécution de la requête
        $result = $mysqli->query($requete);
    
        // Vérification de l'insertion
        if ($result != 1) {
            // En cas d'erreur, ajout d'un message d'erreur
            $_SESSION['errors'][] = 'Une erreur est survenue lors de l\'insertion en base ';
        } else {
            // Réinitialisation des valeurs de la session
            session_unset();
            // Message de succès en session
            $_SESSION['success'] = "Utilisateur créé avec succès";
            // Redirection vers la page de connexion après une inscription réussie
            header('Location: login.php');
            exit(); // Assure-toi d'utiliser exit() après la redirection pour terminer l'exécution du script
        }
    } else {
        // Utilisateur déjà existant
        $_SESSION['errors'][] = 'Utilisateur déjà existant ';
    }
}

// Redirection vers la page d'inscription en cas d'erreur
header('Location: inscription.php');
exit(); // Assure-toi d'utiliser exit() après la redirection pour terminer l'exécution du script
?>
