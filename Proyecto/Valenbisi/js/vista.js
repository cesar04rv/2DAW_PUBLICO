// Variables del mapa
var mapa;

// Crear el mapa
function inicializarMapa() {
  mapa = L.map('map').setView([39.4699, -0.3763], 13);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(mapa);
}

// Función para elegir color según bicis disponibles
function elegirColor(bicis) {
  if (bicis === 0) return '#e74c3c'; // Rojo
  if (bicis < 5) return '#f39c12';   // Naranja
  return '#27ae60';                   // Verde
}

// Marcar ubicación del usuario en el mapa
function marcarUbicacionUsuario(ubicacion) {
  L.circleMarker([ubicacion.lat, ubicacion.lng], {
    color: '#3498db',
    fillColor: '#3498db',
    fillOpacity: 0.8,
    radius: 10
  }).addTo(mapa).bindPopup('<strong>Tu ubicación</strong>');
}

// Centrar el mapa en una ubicación
function centrarMapa(lat, lng, zoom) {
  mapa.setView([lat, lng], zoom);
}

// Mostrar estaciones en el mapa
function mostrarEstacionesEnMapa(estaciones) {
  estaciones.forEach(function (estacion) {
    if (estacion.geo_point_2d) {
      const color = elegirColor(estacion.available);

      L.circleMarker([estacion.geo_point_2d.lat, estacion.geo_point_2d.lon], {
        color: color,
        fillColor: color,
        fillOpacity: 0.7,
        radius: 8
      }).addTo(mapa).bindPopup(`
        <strong>Estación ${estacion.number}</strong><br>
        ${estacion.address}<br>
        Bicis: ${estacion.available}
      `);
    }
  });
}

// Función para mostrar la tabla
function mostrarTabla(datos) {
  const tbody = document.getElementById('tabla');
  tbody.innerHTML = '';

  if (datos.length === 0) {
    tbody.innerHTML = '<tr><td colspan="5" class="center">No hay estaciones</td></tr>';
    return;
  }

  datos.forEach(function (estacion) {
    const fila = document.createElement('tr');
    const dist = estacion.distancia ? estacion.distancia.toFixed(2) + ' km' : 'N/A';

    fila.innerHTML = `
      <td>${estacion.number}</td>
      <td>${estacion.address}</td>
      <td class="center">${estacion.available}</td>
      <td class="center">${estacion.free}</td>
      <td class="center">${dist}</td>
    `;
    tbody.appendChild(fila);
  });
}