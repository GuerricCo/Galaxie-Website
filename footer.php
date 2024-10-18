<footer>
    <div class="footer-content">
        <div class="logo">
            <img src="img/logo.png" alt="Logo carré">
        </div>
        <div class="footer-links">
            <a href="#" onclick="showNewsletter()">S'inscrire à la Newsletter</a>
            <a href="#Contact">Contact</a>
            <a href="#Mentions">Mentions légales</a>
            <a href="#Mentions">A propos de nous</a>
            <a href="#Mentions">Politique de confidentialité</a>
        </div>
        <div class="social-icons">
            <img src="img/instagram-svgrepo-com (2).png" alt="instagram">
            <img src="img/tiktok.png" alt="instagram">
            <img src="img/planete.png" alt="planete">
        </div>
    </div>
    
    <div id="newsletterOverlay" style="position: fixed; top: -50%; left: -50%; transform: translate(-50%, -50%); z-index: 9999; border: 2px solid #fff; background-color: #000;">
    <!-- Placer l'iframe au milieu de la page -->
    <iframe data-w-type="embedded" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://smskt.mjt.lu/wgt/smskt/x2y4/form?c=c3fd7e2c" width="1000px" height="600px"></iframe>
    <button onclick="hideNewsletter()" style="position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%);">Fermer</button> <!-- Bouton pour fermer l'iframe -->
</div>

<script>
function showNewsletter() {
    document.getElementById('newsletterOverlay').style.top = '50%';
    document.getElementById('newsletterOverlay').style.left = '50%';
}

function hideNewsletter() {
    document.getElementById('newsletterOverlay').style.top = '-50%';
    document.getElementById('newsletterOverlay').style.left = '-50%';
}
</script>
</footer>
