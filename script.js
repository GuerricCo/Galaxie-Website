
const menu2 = document.querySelector('.menu2');
const menuBurger = document.querySelector('.menu2 .menu-burger');

menuBurger.addEventListener('click', function () {
  menu2.classList.toggle('active');
});


let currentSection = 1;
let previousScrollY = window.scrollY;
let c = 1;

window.addEventListener("wheel", function (event) {
  const deltaY = event.deltaY;

  if (deltaY > 0) {
    currentSection++;
  } else {
    currentSection--;
  }

  const maxSections = 4;
  currentSection = Math.max(1, Math.min(currentSection, maxSections));

  if (currentSection !== previousScrollY) {
    const element = document.querySelector(`.section${c}`);
    const element2 = document.querySelector(`.btn${c}`);
    if (element) {
      element.classList.replace(`section${c}`, `section${currentSection}`);
    }
    if (element2) {
      element2.classList.replace(`btn${c}`, `btn${currentSection}`);
    }
  }

  previousScrollY = currentSection;
  c = currentSection;

  const buttonElement = document.querySelector(`.btn${currentSection}`);

  if (buttonElement) {
    if (buttonElement.classList.contains("btn1")) {
      buttonElement.textContent = `Découvrir`;
    }
    if (buttonElement.classList.contains("btn2")) {
      buttonElement.textContent = `Découvrir`;
    }
    if (buttonElement.classList.contains("btn3")) {
      buttonElement.textContent = `Découvrir`;
    }
    if (buttonElement.classList.contains("btn4")) {
      buttonElement.textContent = `Découvrir`;
    }

  }

  const titleElement = document.querySelector(`.section${currentSection} h1`);

  if (titleElement) {
    switch (currentSection) {
      case 1:
        titleElement.textContent = "Explorez l'univers, un voyage sans limites !";
        break;
      case 2:
        titleElement.textContent = "Le futur du transport, où l'innovation rencontre les étoiles !";
        break;
      case 3:
        titleElement.textContent = "Rejoignez l'équipe qui repousse les frontières de l'espace !";
        break;
      case 4:
        titleElement.textContent = "Réservez vos billets maintenant !";
        break;
      default:
        break;
    }
  }

  const containerButton1 = document.querySelector('.btn1-container');
  const containerButton2 = document.querySelector('.btn2-container');
  const containerButton3 = document.querySelector('.btn3-container');
  const containerButton4 = document.querySelector('.btn4-container');

  if (containerButton1) {
    containerButton1.classList.replace('btn1-container', `btn${currentSection}-container`);
  }

  if (containerButton2) {
    containerButton2.classList.replace('btn2-container', `btn${currentSection}-container`);
  }

  if (containerButton3) {
    containerButton3.classList.replace('btn3-container', `btn${currentSection}-container`);
  }

  if (containerButton4) {
    containerButton4.classList.replace('btn4-container', `btn${currentSection}-container`);
  }


  const linkElement = document.querySelector(`.btn${currentSection}`);

  if (linkElement) {
    if (linkElement.classList.contains("btn1")) {
      linkElement.href = `https://www.youtube.com/watch?v=yOVZjZkDQes`;
    }
    if (linkElement.classList.contains("btn2")) {
      linkElement.href = `https://www.developpez.net/forums/d2010455/javascript/general-javascript/modifier-nom-d-class/`;
    }
    if (linkElement.classList.contains("btn3")) {
      linkElement.href = `https://www.youtube.com/watch?v=yOVZjZkDQes`;
    }
    if (linkElement.classList.contains("btn4")) {
      linkElement.href = `https://www.youtube.com/watch?v=yOVZjZkDQes`;
    }
  }
});


const bandeaux = document.querySelectorAll(".main_container .bandeau");
const bandeauxContainer = document.querySelector(".main_container");

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(changeBandeau, 1000);
});

function changeBandeau() {
  let n = 0
  bandeaux.forEach((bandeau) => {
    if (n % 2 == 0) {
      bandeau.style.marginTop = "100vh";
      n += 1
    } else {
      n = 0
    }
    bandeau.style.height = 0;
  })
}
