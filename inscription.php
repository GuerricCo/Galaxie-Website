<?php
include('session.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscriptions.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="header.css">
</head>

<body><?php include('header.php'); ?>
    <form action="create.php" method="post">

        <label for="name">Nom<br></label>
        <input type="text" name="name" value="<?php echo isset($_SESSION['values']['name'])?$_SESSION['values']['name']:""; ?>">
        <br>

        <label for="email">Email<br></label>
        <input type="text" name="email" value="<?php echo isset($_SESSION['values']['email'])?$_SESSION['values']['email']:""; ?>">
        <br>

        <label for="password">Mot de Passe<br></label>
        <input type="password" name="password" value="<?php echo isset($_SESSION['values']['password'])?$_SESSION['values']['password']:""; ?>">
        <br>

        <label for="phone">Téléphone<br></label>
        <input type="phone" name="phone" value="<?php echo isset($_SESSION['values']['phone'])?$_SESSION['values']['phone']:""; ?>">
        <br>

        <label for="address">Addresse<br></label>
        <input type="text" name="address" value="<?php echo isset($_SESSION['values']['address'])?$_SESSION['values']['address']:""; ?>">
        <br>

        <button type="submit">Envoyer</button>
        <p class="link">Déjà client? <a href="login.php">Connectez vous</a></p>
    </form>
    <?php
            if (array_key_exists('errors', $_SESSION)) {
                echo '<div class="error-container">';
                foreach($_SESSION['errors'] as $error){
                    echo '<p class="error-message">'.$error.'</p>';
                }
                echo '</div>';
            }
        ?>
    
    <?php include('footer.php'); ?>
</body>
<script src="script.js"></script>

</html>