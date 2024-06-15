document.getElementById("icono-menu").addEventListener("click", function() {
  var dropdownContent = document.getElementById("dropdown-content");
  if (dropdownContent.style.display === "none") {
    dropdownContent.style.display = "block";
  } else {
    dropdownContent.style.display = "none";
  }
});

document.addEventListener("click", function(event) {
  var menu = document.getElementById("dropdown-content");
  if (event.target.closest(".dropdown") !== null) {
    return;
  }
  menu.style.display = "none";
});