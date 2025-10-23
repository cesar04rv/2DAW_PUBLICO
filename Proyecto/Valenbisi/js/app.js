// Punto de arranque de la aplicación

// Esperar a que el DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
  
  // Inicializar mapa
  inicializarMapa();

  // Obtener ubicación del usuario
  obtenerUbicacion();

  // Cargar estaciones
  cargarEstaciones();

  // Configurar buscador
  document.getElementById('search-input').addEventListener('input', function () {
    filtrarEstaciones(this.value);
  });
  
});