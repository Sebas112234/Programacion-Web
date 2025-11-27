// main.js
// Confirmación antes de eliminar
function confirmarEliminar(name, url) {
  if (confirm('¿Eliminar a "' + name + '"?')) {
    window.location = url;
  }
}
