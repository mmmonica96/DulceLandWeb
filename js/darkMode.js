const toggleButton = document.getElementById("toggleDarkMode");

// Verifica el estado guardado en localStorage
if (localStorage.getItem("darkMode") === "enabled") {
  document.body.classList.add("dark-mode");
  const icon = toggleButton.querySelector("i");
  icon.classList.remove("fa-moon");
  icon.classList.add("fa-sun");
}

toggleButton.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  // Cambia el icono
  const icon = toggleButton.querySelector("i");
  if (document.body.classList.contains("dark-mode")) {
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
    localStorage.setItem("darkMode", "enabled");
  } else {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
    localStorage.setItem("darkMode", "disabled");
  }
});
