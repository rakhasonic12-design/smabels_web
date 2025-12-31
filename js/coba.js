const nav = document.querySelector('.navbar ul');
const logo = document.querySelector('.logo');

logo.addEventListener('click', () => {
  nav.classList.toggle('show');
});
