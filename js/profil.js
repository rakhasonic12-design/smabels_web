const menuBtn = document.getElementById('menu-btn');
const navMenu = document.getElementById('nav-menu');
menuBtn.addEventListener('click', () => {
  navMenu.classList.toggle('show');
});

const track = document.getElementById('carousel-track');
const next = document.getElementById('next');
const prev = document.getElementById('prev');
let index = 0;

next.addEventListener('click', () => moveSlide(1));
prev.addEventListener('click', () => moveSlide(-1));

function moveSlide(dir) {
  const slides = track.children.length;
  index = (index + dir + slides) % slides;
  track.style.transform = `translateX(-${index * 320}px)`;
}
