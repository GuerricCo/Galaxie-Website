document.querySelectorAll('.box').forEach(box => {
    box.addEventListener('click', function() {
        window.location.href = this.getAttribute('href');
    });
});
