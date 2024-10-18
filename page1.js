document.querySelectorAll('.sector').forEach(sector => {
    sector.addEventListener('click', function () {
        window.location.href = this.getAttribute('href');
    });
});