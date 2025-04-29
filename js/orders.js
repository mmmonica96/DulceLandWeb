document.addEventListener("DOMContentLoaded", () => {
  window.jspdfReady = false;

  // Cargar jsPDF desde UMD
  if (window.jspdf && window.jspdf.jsPDF) {
    window.jspdfReady = true;
  } else {
    const script = document.createElement("script");
    script.src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js";
    script.onload = () => {
      window.jspdfReady = true;
    };
    document.head.appendChild(script);
  }
});

function generatePDF(button) {
  if (!window.jspdfReady || !window.jspdf || !window.jspdf.jsPDF) {
    alert("PDF no disponible aún. Intenta de nuevo en unos segundos.");
    return;
  }

  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  const product = button.getAttribute("data-product");
  const price = button.getAttribute("data-price");
  const date = button.getAttribute("data-date");
  const status = button.getAttribute("data-status");

  doc.setFontSize(18);
  doc.text("Factura de pedido", 20, 20);

  doc.setFontSize(12);
  doc.text(`Producto: ${product}`, 20, 40);
  doc.text(`Precio total: ${price}`, 20, 50);
  doc.text(`Fecha: ${date}`, 20, 60);
  doc.text(`Estado: ${status}`, 20, 70);

  doc.save("factura_pedido.pdf");
}
