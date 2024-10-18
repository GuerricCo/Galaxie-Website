let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
const header = document.getElementById("header");
const footer = document.querySelector("footer");

window.addEventListener("wheel", function(event) {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  let deltaY = event.deltaY;

  if (deltaY > 0) {
    header.classList.add("header-hidden");
    footer.classList.add("footer-hidden");
  } else {
    header.classList.remove("header-hidden");
    footer.classList.remove("footer-hidden");
  }

  lastScrollTop = scrollTop;
});