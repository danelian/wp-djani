$(document).ready(function () {

  // ------------------- BURGER MENU ---------------------
  const body = document.querySelector('body'),
        navMenu = document.querySelector('#nav-menu'),
        navOpen = document.querySelector('#nav-open'),
        navClose = document.querySelector('#nav-close'),
        navLinks = document.querySelectorAll('.nav-list>li>a');
  navOpen.addEventListener('click', () => {
    navMenu.classList.add('show');
    body.classList.add('dis-scroll');
  })
  navClose.addEventListener('click', () => {
    navMenu.classList.remove('show');
    body.classList.remove('dis-scroll');
  })
  navLinks.forEach(n => n.addEventListener('click', () => {
    navMenu.classList.remove('show');
    body.classList.remove('dis-scroll');
  }))

});