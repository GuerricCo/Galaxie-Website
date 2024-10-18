<?php
session_start();
include('session.php');
include('mydb.php');

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

$user = $_SESSION['user'];

$user_id = $user['id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = $mysqli->query($query);
$user_info = $result->fetch_assoc();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $new_name = $_POST["name"];
    $new_email = $_POST["email"];
    $new_password = $_POST["password"];
    $new_phone = $_POST["phone"];
    $new_address = $_POST["address"];

if (empty($new_name)) {
    $errors[] = "Le champ Nom est requis";
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $new_name)) {
    $errors[] = "Le nom ne peut contenir que des lettres et des espaces";
}

if (empty($new_email)) {
    $errors[] = "Le champ Email est requis";
} elseif (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Adresse email invalide";
}

if (empty($new_password)) {
    $errors[] = "Le champ Mot de passe est requis";
}

if (empty($new_phone)) {
    $errors[] = "Le champ Téléphone est requis";
} elseif (!preg_match("/^[0-9]*$/", $new_phone)) {
    $errors[] = "Le téléphone ne peut contenir que des chiffres";
}

if (empty($new_address)) {
    $errors[] = "Le champ Adresse est requis";
}

if (empty($errors)) {
    $update_query = "UPDATE users SET username='$new_name', email='$new_email', password='$new_password', phone='$new_phone', address='$new_address' WHERE id=$user_id";
    $update_result = $mysqli->query($update_query);

    if ($update_result) {
        $_SESSION['user']['username'] = $new_name;
        $_SESSION['user']['email'] = $new_email;
        unset($_SESSION['modification_errors']);
        
        echo '<meta http-equiv="refresh" content="0">';
    } else {
        $errors[] = "Erreur lors de la mise à jour des informations";
    }
} else {
    $_SESSION['modification_errors'] = $errors;
}

}

if (isset($_SESSION['modification_errors'])) {
    $errors = $_SESSION['modification_errors'];
}

$is_in_modification_session = isset($_SESSION['modification_errors']) && !empty($_SESSION['modification_errors']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="section">
    <div class="container2">
    <div class="pair">
        <a href="#" class="box-link">
            <div class="box">
                <div class="icon"><img src="img/commande.png" alt="Logo 1"></div>
                <div class="content">
                    <h2>Vos commandes</h2>
                    <p>Suivre, retourner ou acheter à nouveau</p>
                </div>
            </div>
        </a>
        <a href="#" class="box-link">
            <div class="box">
            <div class="icon"><img src="img/prime.png" alt="Logo 2"></div>
                <div class="content">
                    <h2>Prime</h2>
                    <p>Voir les avantages et les paramètres de paiement</p>
                </div>
            </div>
        </a>
    </div>
    <div class="pair">
        <a href="#" class="box-link">
            <div class="box">
            <div class="icon"><img src="img/carte.png" alt="Logo 3"></div>
                <div class="content">
                    <h2>Cartes cadeaux</h2>
                    <p>Ajouter une carte cadeau, voir votre solde, ou recharger votre compte</p>
                </div>
            </div>
        </a>
        <a href="#" class="box-link">
            <div class="box">
            <div class="icon"><img src="img/paiement.png" alt="Logo 4"></div>
                <div class="content">
                    <h2>Vos paiements</h2>
                    <p>Afficher toutes les transactions, gérer les modes de paiements et les paramétres</p>
                </div>
            </div>
        </a>
    </div>
</div>

    



        
        <div class="container">
            <h1>Bienvenue <?php echo $user['username']; ?></h1>
            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user_info['username']); ?>" <?php echo (!empty($errors) ? '' : 'disabled'); ?>><br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($user_info['email']); ?>" <?php echo (!empty($errors) ? '' : 'disabled'); ?>><br>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user_info['password']); ?>" <?php echo (!empty($errors) ? '' : 'disabled'); ?>><br>
                <label for="phone">Téléphone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user_info['phone']); ?>" <?php echo (!empty($errors) ? '' : 'disabled'); ?>><br>
                <label for="address">Adresse:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user_info['address']); ?>" <?php echo (!empty($errors) ? '' : 'disabled'); ?>><br>
                <button type="button" id="editButton" class="edit-button" onclick="enableFields()" <?php echo (!empty($errors) ? 'style="display: none;"' : ''); ?>>Modifier</button>
                <input type="submit" value="Valider la modification" id="submitButton" <?php echo ($is_in_modification_session ? 'style="display:block;"' : 'style="display:none;"'); ?>>

            </form>
            <a href="logout.php">Déconnexion</a>
    </div>
                    </div>

    <script>
        function enableFields() {
            var inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
            inputs.forEach(function(input) {
                input.disabled = false;
            });
            document.getElementById('editButton').style.display = 'none';
            document.getElementById('submitButton').style.display = 'block';
        }
    </script>
    <?php include('footer.php'); ?>
</body>
<script src="script.js"></script>
</html>
