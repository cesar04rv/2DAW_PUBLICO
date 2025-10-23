// Variables globales
var estaciones = [];
var miUbicacion = null;

// Función para calcular distancia entre dos puntos
function calcularDistancia(lat1, lon1, lat2, lon2) {
  const R = 6371; // Radio de la Tierra en km
  const dLat = (lat2 - lat1) * Math.PI / 180;
  const dLon = (lon2 - lon1) * Math.PI / 180;
  const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  return R * c;
}

// Función para actualizar las distancias
function actualizarDistancias() {
  if (!miUbicacion) return;

  estaciones.forEach(function (estacion) {
    if (estacion.geo_point_2d) {
      estacion.distancia = calcularDistancia(
        miUbicacion.lat,
        miUbicacion.lng,
        estacion.geo_point_2d.lat,
        estacion.geo_point_2d.lon
      );
    }
  });
}

// Cargar datos de la API
async function cargarEstaciones() {
  try {
    // Hacer 3 peticiones para obtener todas las estaciones
    const respuesta1 = await fetch('https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records?limit=100&offset=0');
    const datos1 = await respuesta1.json();
    
    const respuesta2 = await fetch('https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records?limit=100&offset=100');
    const datos2 = await respuesta2.json();
    
    const respuesta3 = await fetch('https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records?limit=100&offset=200');
    const datos3 = await respuesta3.json();
    
    // Juntar todas las estaciones
    estaciones = datos1.results.concat(datos2.results).concat(datos3.results);

    // Mostrar estaciones en el mapa
    mostrarEstacionesEnMapa(estaciones);

    // Actualizar distancias si ya tengo ubicación
    actualizarDistancias();

    // Mostrar tabla
    mostrarTabla(estaciones);

  } catch (error) {
    console.error('Error:', error);
    document.getElementById('tabla').innerHTML = '<tr><td colspan="5" class="center" style="color:red;">Error al cargar datos</td></tr>';
  }
}

// Obtener ubicación del usuario
function obtenerUbicacion() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (posicion) {
      miUbicacion = {
        lat: posicion.coords.latitude,
        lng: posicion.coords.longitude
      };

      // Marcar mi ubicación en el mapa
      marcarUbicacionUsuario(miUbicacion);

      // Centrar mapa en mi ubicación
      centrarMapa(miUbicacion.lat, miUbicacion.lng, 15);

      // Actualizar distancias
      actualizarDistancias();
      mostrarTabla(estaciones);
    });
  }
}

// Filtrar estaciones por búsqueda
function filtrarEstaciones(busqueda) {
  const filtradas = estaciones.filter(function (estacion) {
    return estacion.address.toLowerCase().includes(busqueda.toLowerCase());
  });
  mostrarTabla(filtradas);
}