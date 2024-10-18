<?php
session_start();
$_SESSION['values'] = array();
unset($_SESSION['errors']);
unset($_SESSION['success']);

include("mydb.php");
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $mysqli->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if ($result->num_rows == 1) {
        $_SESSION['user'] = $result->fetch_assoc();
        header('location: profile.php');
        exit();
    } else {
        $_SESSION['error'] = 'Adresse e-mail ou mot de passe incorrect';
        header('location: login.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="header.css">
    <style>
        .error-container {
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="container">
        <h2>Connexion</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <input type="submit" value="Se connecter">
            </div>
        </form>
        <p class="link">Nouveau client? <a href="inscription.php">Commencez ici</a></p>
        
    </div>
    <?php if(isset($_SESSION['error'])): ?>
        <div class="error-container">
            <p class="error-message"><?php echo $_SESSION['error']; ?></p>
        </div>
        <?php unset($_SESSION['error']);?>
        <?php endif; ?>
    <?php include('footer.php'); ?>
</body>
<script src="script.js"></script>

</html>
