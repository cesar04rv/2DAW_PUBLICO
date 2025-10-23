# 🚲 Proyecto Valenbisi

<div align="center">

![Valenbisi Logo](https://img.shields.io/badge/Valenbisi-Valencia-orange?style=for-the-badge)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Leaflet](https://img.shields.io/badge/Leaflet-199900?style=for-the-badge&logo=leaflet&logoColor=white)

**Aplicación web para consultar en tiempo real la disponibilidad de bicicletas en las estaciones del sistema Valenbisi de Valencia**

[Ver Demo](#) • [Reportar Bug](#) • [Solicitar Funcionalidad](#)

</div>

---

## 📋 Tabla de Contenidos

- [Acerca del Proyecto](#-acerca-del-proyecto)
- [Características Principales](#-características-principales)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Instalación](#-instalación)
- [Uso](#-uso)
- [Arquitectura](#-arquitectura)
- [Tecnologías](#-tecnologías-utilizadas)
- [API Utilizada](#-api-utilizada)
- [Código de Colores](#-código-de-colores)
- [Funcionalidades Técnicas](#-funcionalidades-técnicas)
- [Capturas de Pantalla](#-capturas-de-pantalla)
- [Roadmap](#-roadmap)
- [Contribuir](#-contribuir)
- [Licencia](#-licencia)
- [Contacto](#-contacto)

---

## 🎯 Acerca del Proyecto

Valenbisi es el sistema de bicicletas públicas de la ciudad de Valencia. Esta aplicación web permite a los usuarios consultar en tiempo real la disponibilidad de bicicletas y anclajes libres en cada una de las estaciones distribuidas por la ciudad.

### ¿Por qué este proyecto?

- 🚴 **Movilidad sostenible**: Fomentar el uso de la bicicleta pública
- 📊 **Información en tiempo real**: Datos actualizados al instante
- 📍 **Geolocalización**: Encuentra la estación más cercana a ti
- 🎨 **Interfaz intuitiva**: Visualización clara mediante mapa y tabla

---

## ✨ Características Principales

### 🗺️ Mapa Interactivo
- Visualización de todas las estaciones de Valenbisi en un mapa de Leaflet
- Marcadores con código de colores según disponibilidad
- Popups informativos al hacer clic en cada estación
- Centrado automático en la ubicación del usuario

### 📍 Geolocalización
- Detección automática de la ubicación del usuario
- Cálculo de distancia en kilómetros a cada estación
- Marcador azul indicando tu posición actual

### 📊 Tabla de Datos
- Listado completo de todas las estaciones
- Información detallada: número, dirección, bicis disponibles, anclajes libres y distancia
- Ordenación y filtrado dinámico

### 🔍 Búsqueda
- Buscador de estaciones por dirección
- Filtrado en tiempo real mientras escribes
- Resultados inmediatos

### 📱 Diseño Responsive
- Adaptado a dispositivos móviles, tablets y escritorio
- Interfaz optimizada para cualquier pantalla

---

## 📁 Estructura del Proyecto

```
proyecto-valenbisi/
│
├── css/
│   └── estilos.css              # Estilos CSS, diseño responsive
│
├── js/
│   ├── app.js                   # Inicialización de la aplicación
│   ├── controlador.js           # Lógica de negocio y llamadas a la API
│   └── vista.js                 # Renderizado del mapa y la tabla
│
├── index.html                   # Estructura HTML principal
└── README.md                    # Documentación del proyecto
```

### Descripción de Archivos

#### 📄 `index.html`
Contiene la estructura base de la aplicación:
- Contenedor del mapa interactivo
- Leyenda de colores
- Buscador de estaciones
- Tabla de información
- Enlaces a librerías externas (Leaflet)

#### 🎨 `css/estilos.css`
Define todos los estilos visuales:
- Diseño general y paleta de colores
- Estilos del mapa y la tabla
- Media queries para responsive design
- Transiciones y efectos hover

#### 🚀 `js/app.js`
Punto de entrada de la aplicación:
- Inicializa el mapa
- Coordina la carga de datos
- Configura eventos del buscador
- Gestiona el flujo principal

#### 🎮 `js/controlador.js`
Lógica de negocio:
- Realiza peticiones a la API de Valenbisi
- Calcula distancias geográficas (fórmula de Haversine)
- Gestiona la geolocalización del usuario
- Filtra y procesa datos de estaciones

#### 🎨 `js/vista.js`
Capa de presentación:
- Renderiza el mapa con Leaflet
- Crea y actualiza marcadores de estaciones
- Genera la tabla HTML dinámicamente
- Aplica código de colores según disponibilidad

---

## 🚀 Instalación

### Requisitos Previos

- Navegador web moderno (Chrome, Firefox, Safari, Edge)
- Conexión a internet (para cargar librerías y datos de la API)

### Pasos de Instalación

1. **Clonar o descargar el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/proyecto-valenbisi.git
   cd proyecto-valenbisi
   ```

2. **Verificar la estructura de carpetas**
   ```
   proyecto-valenbisi/
   ├── css/
   ├── js/
   └── index.html
   ```

3. **Abrir el archivo principal**
   - Doble clic en `index.html`
   - O arrastra el archivo a tu navegador

4. **Permitir geolocalización** (opcional)
   - El navegador te pedirá permiso para acceder a tu ubicación
   - Acepta para ver la distancia a cada estación

¡Listo! La aplicación se ejecutará automáticamente.

---

## 💻 Uso

### Inicio de la Aplicación

1. Al abrir `index.html`, verás:
   - Un mapa centrado en Valencia
   - Todos los marcadores de estaciones con colores
   - Una tabla con información detallada

2. Si permites la geolocalización:
   - El mapa se centrará en tu ubicación
   - Aparecerá un marcador azul en tu posición
   - La tabla mostrará las distancias calculadas

### Navegación por el Mapa

- **Zoom**: Rueda del ratón o botones +/-
- **Desplazamiento**: Arrastra con el ratón
- **Ver detalles**: Clic en cualquier marcador
- **Popup**: Muestra número de estación, dirección y bicis disponibles

### Uso del Buscador

1. Escribe en el campo "Buscar estación por dirección..."
2. Los resultados se filtran automáticamente
3. La tabla muestra solo las estaciones que coinciden

### Interpretación de Colores

| Color | Significado | Bicis Disponibles |
|-------|-------------|-------------------|
| 🟢 Verde | Alta disponibilidad | ≥ 5 bicis |
| 🟠 Naranja | Baja disponibilidad | 1-4 bicis |
| 🔴 Rojo | Sin bicis | 0 bicis |
| 🔵 Azul | Tu ubicación | - |

---

## 🏗️ Arquitectura

La aplicación sigue un patrón **MVC simplificado**:

```
┌─────────────────────────────────────────────┐
│              index.html (Vista)              │
│  - Estructura HTML                           │
│  - Contenedores para mapa y tabla            │
└─────────────────┬───────────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────────┐
│           app.js (Controlador)               │
│  - Inicializa componentes                    │
│  - Coordina flujo de datos                   │
└──────────┬──────────────────┬────────────────┘
           │                  │
           ▼                  ▼
┌──────────────────┐  ┌──────────────────────┐
│  controlador.js  │  │     vista.js         │
│  (Modelo/Lógica) │  │  (Presentación)      │
│                  │  │                      │
│  - API calls     │  │  - Render mapa       │
│  - Cálculos      │  │  - Render tabla      │
│  - Filtrado      │  │  - Colores           │
└──────────────────┘  └──────────────────────┘
```

### Flujo de Datos

```
Usuario abre index.html
         │
         ▼
app.js inicializa la aplicación
         │
         ├─► vista.js crea el mapa
         │
         ├─► controlador.js solicita geolocalización
         │
         └─► controlador.js carga datos de la API
                    │
                    ├─► 3 peticiones paralelas (100 estaciones c/u)
                    │
                    ▼
         datos procesados y combinados
                    │
                    ├─► vista.js renderiza marcadores en mapa
                    │
                    └─► vista.js genera tabla HTML
```

---

## 🛠️ Tecnologías Utilizadas

### Frontend

| Tecnología | Versión | Uso |
|------------|---------|-----|
| **HTML5** | - | Estructura semántica |
| **CSS3** | - | Estilos y diseño responsive |
| **JavaScript** | ES6+ | Lógica de la aplicación |
| **Leaflet.js** | 1.9.4 | Mapas interactivos |

### APIs Externas

- **Valenbisi Open Data API**: Datos en tiempo real de estaciones
- **OpenStreetMap**: Tiles para el mapa
- **Geolocation API**: Ubicación del usuario

### Librerías CDN

```html
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />

<!-- Leaflet JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
```

---

## 🌐 API Utilizada

### Valenbisi Open Data Platform

**Base URL**: `https://valencia.opendatasoft.com/api/explore/v2.1/`

**Dataset**: `valenbisi-disponibilitat-valenbisi-dsiponibilidad`

#### Endpoint

```
GET /catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records
```

#### Parámetros

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `limit` | integer | Número de registros por petición (máx. 100) |
| `offset` | integer | Desplazamiento para paginación |
| `order_by` | string | Campo de ordenación |

#### Ejemplo de Petición

```javascript
fetch('https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records?limit=100&offset=0')
```

#### Estructura de Respuesta

```json
{
  "total_count": 275,
  "results": [
    {
      "number": 1,
      "address": "C/ Xàtiva, 30-32",
      "available": 5,
      "free": 15,
      "total": 20,
      "geo_point_2d": {
        "lat": 39.4699,
        "lon": -0.3763
      },
      "updated_at": "2025-10-23T10:30:00"
    }
  ]
}
```

#### Estrategia de Carga

Para obtener todas las estaciones (~275), se realizan **3 peticiones paralelas**:

1. `offset=0` → estaciones 1-100
2. `offset=100` → estaciones 101-200
3. `offset=200` → estaciones 201-275

---

## 🎨 Código de Colores

La aplicación utiliza un sistema de semáforo para indicar la disponibilidad:

### Verde (#27ae60) 🟢
- **Significado**: Alta disponibilidad
- **Condición**: `available >= 5`
- **Uso**: Estaciones con muchas bicis disponibles

### Naranja (#f39c12) 🟠
- **Significado**: Baja disponibilidad
- **Condición**: `1 <= available < 5`
- **Uso**: Estaciones con pocas bicis

### Rojo (#e74c3c) 🔴
- **Significado**: Sin disponibilidad
- **Condición**: `available === 0`
- **Uso**: Estaciones vacías

### Azul (#3498db) 🔵
- **Significado**: Ubicación del usuario
- **Uso**: Marcador de posición GPS

---

## ⚙️ Funcionalidades Técnicas

### 1. Geolocalización

```javascript
// Obtener posición del usuario
navigator.geolocation.getCurrentPosition(function(position) {
  const lat = position.coords.latitude;
  const lng = position.coords.longitude;
  // Centrar mapa y calcular distancias
});
```

### 2. Cálculo de Distancias (Haversine)

La fórmula de Haversine calcula la distancia entre dos puntos en una esfera:

```javascript
function calcularDistancia(lat1, lon1, lat2, lon2) {
  const R = 6371; // Radio de la Tierra en km
  const dLat = (lat2 - lat1) * Math.PI / 180;
  const dLon = (lon2 - lon1) * Math.PI / 180;
  
  const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(lat1 * Math.PI / 180) * 
            Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLon/2) * Math.sin(dLon/2);
  
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  return R * c; // Distancia en km
}
```

### 3. Renderizado Dinámico

- **Marcadores**: Creados dinámicamente con `L.circleMarker()`
- **Tabla**: Generada con `createElement()` y `innerHTML`
- **Filtrado**: Actualización en tiempo real con `filter()`

### 4. Responsive Design

Media query principal:
```css
@media (max-width: 650px) {
  /* Adapta tabla a formato card en móviles */
}
```

---

## 📸 Capturas de Pantalla

### Vista de Escritorio
```
┌────────────────────────────────────────────┐
│         🚲 Valenbisi - Mapa               │
├────────────────────────────────────────────┤
│                                            │
│         [MAPA INTERACTIVO]                 │
│         🔴🟠🟢 Estaciones                  │
│                                            │
├────────────────────────────────────────────┤
│  🟢 Muchas  🟠 Pocas  🔴 Sin  🔵 Tú       │
├────────────────────────────────────────────┤
│  🔍 [Buscar estación...]                   │
├────────────────────────────────────────────┤
│  Nº  │ Dirección │ Bicis │ Anclajes │ Dist│
│  148 │ C/Xàtiva  │   5   │    15    │0.74 │
│  ...                                       │
└────────────────────────────────────────────┘
```

### Vista Móvil
```
┌──────────────────┐
│  🚲 Valenbisi    │
├──────────────────┤
│                  │
│  [MAPA]          │
│                  │
├──────────────────┤
│ 🟢🟠🔴🔵 Leyenda │
├──────────────────┤
│ 🔍 Buscar...     │
├──────────────────┤
│ ┌──────────────┐ │
│ │ Estación: 148│ │
│ │ C/Xàtiva     │ │
│ │ Bicis: 5     │ │
│ │ Dist: 0.74km │ │
│ └──────────────┘ │
└──────────────────┘
```

---

## 🗺️ Roadmap

### Versión 1.0 (Actual) ✅
- [x] Mapa interactivo con Leaflet
- [x] Geolocalización del usuario
- [x] Cálculo de distancias
- [x] Tabla de información
- [x] Buscador por dirección
- [x] Código de colores
- [x] Diseño responsive

### Versión 1.1 (Próximamente) 🔜
- [ ] Actualización automática cada 30 segundos
- [ ] Ordenar tabla por distancia/disponibilidad
- [ ] Filtros avanzados (solo con bicis, etc.)
- [ ] Modo oscuro
- [ ] Guardar estaciones favoritas

### Versión 2.0 (Futuro) 🚀
- [ ] Rutas entre estaciones
- [ ] Historial de disponibilidad
- [ ] Notificaciones push
- [ ] PWA (Progressive Web App)
- [ ] Compartir ubicación de estación
- [ ] Integración con Google Maps

---

## 🤝 Contribuir

¡Las contribuciones son bienvenidas! Si quieres mejorar el proyecto:

1. **Fork** el repositorio
2. Crea una **rama** para tu funcionalidad (`git checkout -b feature/NuevaFuncionalidad`)
3. **Commit** tus cambios (`git commit -m 'Añadir nueva funcionalidad'`)
4. **Push** a la rama (`git push origin feature/NuevaFuncionalidad`)
5. Abre un **Pull Request**

### Guía de Estilo

- Usa nombres de variables descriptivos
- Comenta el código complejo
- Mantén las funciones pequeñas y específicas
- Sigue la estructura de archivos existente

---

## 📝 Notas Importantes

### Limitaciones

- **Requiere internet**: Para cargar mapas y datos de la API
- **CORS**: La API debe permitir peticiones desde tu dominio
- **Límite de peticiones**: La API puede tener rate limiting
- **Precisión GPS**: Depende del dispositivo del usuario

### Compatibilidad de Navegadores

| Navegador | Versión Mínima |
|-----------|----------------|
| Chrome | 90+ |
| Firefox | 88+ |
| Safari | 14+ |
| Edge | 90+ |

### Privacidad

- La aplicación **no almacena** tu ubicación
- **No recopila** datos personales
- **No usa cookies**
- Datos de geolocalización solo en memoria (sesión actual)

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT.

```
MIT License

Copyright (c) 2025 Proyecto Valenbisi

Se concede permiso, de forma gratuita, a cualquier persona que obtenga una copia
de este software y archivos de documentación asociados (el "Software"), para usar
el Software sin restricciones, incluyendo sin limitación los derechos de usar,
copiar, modificar, fusionar, publicar, distribuir, sublicenciar y/o vender copias
del Software...
```

---

## 👥 Contacto

**Desarrollador**: César Rodríguez

- 📧 Email: cesar2004rv@gmail.com

**Enlace del Proyecto**: [https://github.com/cesar04rv/proyecto-valenbisi](https://github.com/cesar04rv/proyecto-valenbisi)

---



[Volver arriba ⬆](#-proyecto-valenbisi)

</div>