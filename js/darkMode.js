const toggleButton = document.getElementById("toggleDarkMode");

//verify the status stored in localStorage
//if the person changes the view and activates the dark mode,
//it's maintained
if (localStorage.getItem("darkMode") === "enabled") {
  document.body.classList.add("dark-mode");
  const icon = toggleButton.querySelector("i");
  icon.classList.remove("fa-moon");
  icon.classList.add("fa-sun");
}

toggleButton.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  //change the icon
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
