<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- Include the CesiumJS JavaScript and CSS files -->
  <script src="https://cesium.com/downloads/cesiumjs/releases/1.106/Build/Cesium/Cesium.js"></script>
  <link href="https://cesium.com/downloads/cesiumjs/releases/1.106/Build/Cesium/Widgets/widgets.css" rel="stylesheet">
</head>
<body>
  <div id="cesiumContainer"></div>
  <script>
    // Your access token can be found at: https://ion.cesium.com/tokens.
    // This is the default access token from your ion account

    Cesium.Ion.defaultAccessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI0NDE5NmJkZi0wZjM5LTRjNzgtOWYxMy0yN2MwNjIyMTMxMDIiLCJpZCI6MTM0MTkxLCJpYXQiOjE2ODE3ODA0Nzd9.4Z7pSaszFeEo6GGkmlZ03C_OiHSBNaGKkoI0cGW4DdI';

    // Initialize the Cesium Viewer in the HTML element with the `cesiumContainer` ID.
    const viewer = new Cesium.Viewer('cesiumContainer', {
      terrainProvider: Cesium.createWorldTerrain()
    });    
    // Add Cesium OSM Buildings, a global 3D buildings layer.
    const buildingTileset = viewer.scene.primitives.add(Cesium.createOsmBuildings());   
    // Fly the camera to San Francisco at the given longitude, latitude, and height.
    viewer.camera.flyTo({
      destination : Cesium.Cartesian3.fromDegrees(-122.4175, 37.655, 400),
      orientation : {
        heading : Cesium.Math.toRadians(0.0),
        pitch : Cesium.Math.toRadians(-15.0),
      }
    });
  </script>
 </div>
</body>
</html><?php /**PATH C:\Users\sudch\git\3dmappinglaravel\resources\views\helloworld.blade.php ENDPATH**/ ?>