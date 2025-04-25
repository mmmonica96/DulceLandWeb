//doesn't wait for the image to load, the event is fired
document.addEventListener("DOMContentLoaded", () => {
  const dialog = document.getElementById("productDialog");
  const dialogImg = dialog.querySelector(".carousel-img");
  const dialogTitle = document.getElementById("dialogTitle");
  const dialogDesc = document.getElementById("dialogDescription");
  const prevBtn = document.getElementById("prev");
  const nextBtn = document.getElementById("next");

  //aditional product descriptions
  const extraDescriptions = {
    red: "La Red Velvet tiene un sabor delicado con capas de mousse de queso crema.",
    redVelvetSinGluten:
      "Deliciosa tarta Red Velvet sin gluten. Realizado con una mezcla de harinas que no contienen gluten.",
    tejas: "Deliciosas tejas de almendra, perfectas para acompañar un café.",
    tartaQuesoSinGluten: "Deliciosa tarta de queso sin gluten.",
    tartaTresChocolatesSinGluten:
      "Deliciosa tarta de tres chocolates sin gluten.",
  };

  //images for products
  const images = {
    red: ["../img/red3.jpg", "../img/red4.jpg"],
    redVelvetSinGluten: ["../img/redSin.jpg"],
    tejas: ["../img/tejas1.jpg", "../img/tejas2.jpg"],
    tartaQuesoSinGluten: [
      "../img/tartaQuesosingluten.png",
      "../img/tartaQuesoSin.jpg",
    ],
    tartaTresChocolatesSinGluten: [
      "../img/tarta_imperial1.jpg",
      "../img/tarta_imperial_chocolate2.jpg",
    ],
  };

  let currentImages = [];
  let currentIndex = 0;

  function showDialog(title, desc, imgList) {
    currentImages = imgList;
    currentIndex = 0;
    dialogImg.src = currentImages[currentIndex];
    dialogTitle.textContent = title;
    dialogDesc.textContent = desc;
    dialog.showModal();
  }

  //carousel buttons
  prevBtn.onclick = () => {
    currentIndex =
      (currentIndex - 1 + currentImages.length) % currentImages.length;
    dialogImg.src = currentImages[currentIndex];
  };

  nextBtn.onclick = () => {
    currentIndex = (currentIndex + 1) % currentImages.length;
    dialogImg.src = currentImages[currentIndex];
  };

  //event listener for product images
  document.querySelectorAll(".product-card img").forEach((img) => {
    img.style.cursor = "pointer";
    img.addEventListener("click", () => {
      const alt = img.alt.toLowerCase();
      const title =
        img.closest(".product-card").querySelector("h3")?.textContent ||
        "Producto";
      const desc =
        img.closest(".product-card").querySelector("p")?.textContent || "";
      let imgs = images.red;
      let extraDesc = extraDescriptions.red;

      //we assign images and descriptions according to the product
      if (alt.includes("tejas")) {
        imgs = images.tejas;
        extraDesc = extraDescriptions.tejas;
      } else if (alt.includes("queso") || alt.includes("tarta")) {
        imgs = images.tartaQuesoSinGluten;
        extraDesc = extraDescriptions.tartaQuesoSinGluten;
      } else if (alt.includes("imperial")) {
        imgs = images.tartaTresChocolatesSinGluten;
        extraDesc = extraDescriptions.tartaTresChocolatesSinGluten;
      } else if (alt.includes("red velvet sin gluten")) {
        imgs = images.redVelvetSinGluten;
        extraDesc = extraDescriptions.redVelvetSinGluten;
      }

      //display dialog with product information
      showDialog(title, extraDesc, imgs);
    });
  });
});
