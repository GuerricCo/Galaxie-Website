<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header id="header">
    <div class="menus">
        <nav class="menu">
            <a href="http://dev.local/index.php"><img src="img/logo.png" alt="logo"></a>
            <ul>
                <li><a href="#Galact-1">Galact-1</a></li>
                <li><a href="#Galact-2">Galact-2</a></li>
                <li><a href="http://dev.local/page1.php">Actualités</a></li>
                <li><a href="#Billets">Billets</a></li>
                <li><a href="#Qui sommes nous?">Qui sommes nous?</a></li>
            </ul>
        </nav>
        <nav class="menu2">
            <div class="menu-burger">
                <div class="burger-line"></div>
                <div class="burger-line"></div>
                <div class="burger-line"></div>
            </div>
            <ul class="menu-list">
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="profile.php">Compte</a></li>
                <?php else : ?>
                    <li><a href="login.php">Connexion</a></li>
                <?php endif; ?>
                <li><a href="#Rechercher">Rechercher</a></li>
                <li><a href="#Panier">Panier</a></li>
            </ul>
        </nav>
    </div>
</header>
