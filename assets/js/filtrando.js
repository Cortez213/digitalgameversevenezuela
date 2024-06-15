var pageNumbers = document.querySelectorAll('.page');
var previousPageBtn = document.getElementById('previousPage');
var nextPageBtn = document.getElementById('nextPage');

var currentPage = 1;
var totalPages = pageNumbers.length;

function showPage(page) {
  // Ocultar todas las páginas
  for (var i = 0; i < totalPages; i++) {
    pageNumbers[i].style.display = 'none';
  }
  // Mostrar página actual
  pageNumbers[page - 1].style.display = 'inline-block';

  // Deshabilitar o habilitar botones de navegación
  if (page === 1) {
    previousPageBtn.disabled = true;
  } else {
    previousPageBtn.disabled = false;
  }
  if (page === totalPages) {
    nextPageBtn.disabled = true;
  } else {
    nextPageBtn.disabled = false;
  }
}

function goToPreviousPage() {
  if (currentPage > 1) {
    currentPage--;
    showPage(currentPage);
  }
}

function goToNextPage() {
  if (currentPage < totalPages) {
    currentPage++;
    showPage(currentPage);
  }
}

// Mostrar la página inicial
showPage(currentPage);

// Agregar eventos de clic a los botones de navegación
previousPageBtn.addEventListener('click', goToPreviousPage);
nextPageBtn.addEventListener('click', goToNextPage);








