const readButtons = document.querySelectorAll('.read-more');
const modal = document.getElementById('news-modal');
const modalTitle = document.getElementById('modal-title');
const modalDate = document.getElementById('modal-date');
const modalBody = document.getElementById('modal-body');
const closeBtn = document.querySelector('.close');

readButtons.forEach((btn, i) => {
  btn.addEventListener('click', () => {
    modal.style.display = 'flex';
    modalTitle.textContent = newsDetails[i].title;
    modalDate.textContent = newsDetails[i].date;
    modalBody.textContent = newsDetails[i].body;
  });
});

closeBtn.addEventListener('click', () => modal.style.display = 'none');
window.addEventListener('click', (e) => {
  if (e.target === modal) modal.style.display = 'none';
});
