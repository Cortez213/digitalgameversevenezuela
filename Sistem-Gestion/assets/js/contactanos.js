const contactBtn = document.getElementById('contact-btn');
const contactPopup = document.getElementById('contact-popup');
const closeBtn = document.getElementById('close-btn');

contactBtn.addEventListener('click', function() {
  contactPopup.style.display = 'block';
});

closeBtn.addEventListener('click', function() {
  contactPopup.style.display = 'none';
});