<div align="center">

# - Atlas " Spatial Geographic Information System (Web-GIS)

### *Interactive Web Mapping & Geospatial Data Visualization Platform*

![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Leaflet](https://img.shields.io/badge/Leaflet-1.9-199900?style=for-the-badge&logo=leaflet&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![GeoJSON](https://img.shields.io/badge/GeoJSON-Data-000000?style=for-the-badge&logo=json&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-blue?style=for-the-badge)

---

</div>

## " About Atlas

**Atlas** is an interactive **Web-GIS (Geographic Information System)** application built to visualize geospatial datasets, boundary maps, point-of-interest (POI) clusters, and spatial analytics. It enables researchers, urban planners, and administrators to interactively inspect map layers, query spatial attributes, and render geographic overlays.

---

##  Key Features

### " 1. Interactive Map Canvas
- Multi-provider basemap support (OpenStreetMap, Satellite Tiles, CartoDB Light/Dark).
- Smooth zoom, pan, and coordinate tracking (Latitude / Longitude).
- Custom map marker icons and popups with rich HTML metadata.

### " 2. Geospatial Layer & GeoJSON Management
- Import and render GeoJSON feature collections (Polygons, Lines, Points).
- Dynamic layer toggling (Administrative Boundaries, Zoning, Facilities).
- Color-coded thematic mapping (Choropleth Maps) based on dataset values.

### " 3. Proximity Search & Cluster Analysis
- Marker clustering for high-density spatial datasets to maintain 60 FPS map rendering.
- Distance calculator & buffer zone radius search around selected coordinates.
- Filter spatial features by category, name, or attribute value.

---

##   Technology Stack

| Layer | Technologies |
| :--- | :--- |
| **Frontend Map Rendering** | Leaflet.js 1.9+, Turf.js (Geospatial Analysis) |
| **Data Format** | GeoJSON, WKT (Well-Known Text), JSON API |
| **Backend & API** | PHP 8.x / Native JSON API Endpoints |
| **Styling & UI** | Custom CSS3, FontAwesome Icons, HTML5 Canvas |

---

## " Repository Structure

`
atlas/
""" assets/
"   """ css/            # Custom Map & UI Stylesheets
"   """ js/             # Leaflet Init & Spatial Query Logic
"   """" images/         # Map Markers & Icon Assets
""" data/
"   """ geojson/        # Spatial Layers (Boundaries, Roads, POIs)
"   """" spatial.json    # Feature Attributes Database
""" api/                # PHP Backend Endpoints for Spatial Queries
""" index.php           # Main Map Canvas & Interface
"""" README.md           # Documentation
`

---

##  Quick Start Guide

### Prerequisites
- Any standard web server (Laragon, XAMPP, Nginx, or PHP CLI Server).
- Modern web browser with WebGL/Canvas support.

### Running Locally

`ash
# 1. Clone Repository
git clone https://github.com/raphlv/atlas.git
cd atlas

# 2. Start PHP Local Server
php -S localhost:8000

# 3. Open in Browser
# Access http://localhost:8000 in your browser
`

---

## " License & Author

Distributed under the **MIT License**.

' **Author**: [Pangeran Ryan Pahlevi](https://github.com/raphlv)  
 **Email**: [pangeranryan080504@gmail.com](mailto:pangeranryan080504@gmail.com)  

---
<div align="center">
  <sub>Automated Sync Enabled for Contribution Tracking | Last Updated: 2026-08-18 14:37:04</sub>
</div>
