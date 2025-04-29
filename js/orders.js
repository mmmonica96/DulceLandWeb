function generatePDF(button) {
  //obtaining product data from data attributes
  const product = button.getAttribute("data-product");
  const price = button.getAttribute("data-price");
  const date = button.getAttribute("data-date");

  //change product status"
  let status = button.getAttribute("data-status");
  if (product === "Cupcakes decorados") {
    status = "Pendiente de recogida";
  }

  //create an instance
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  //pdf
  doc.setFontSize(20);
  doc.text("Factura - Pastelería DulceLand", 20, 20);

  //order information
  doc.setFontSize(14);
  doc.text(`Producto: ${product}`, 20, 40);
  doc.text(`Precio: ${price}`, 20, 50);
  doc.text(`Fecha: ${date}`, 20, 60);
  doc.text(`Estado: ${status}`, 20, 70);

  //generate PDF
  doc.save(`${product}-factura.pdf`);
}
