<?php
include("mydb.php");

// Vérifier si l'identifiant de l'utilisateur à supprimer est présent dans la requête POST
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Requete delete
    $result = $mysqli->query("DELETE FROM users WHERE id='$user_id'");

    // Vérifier si la suppression a réussi
    if ($result) {
        header("Location: administration.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
} else {
}
?>

