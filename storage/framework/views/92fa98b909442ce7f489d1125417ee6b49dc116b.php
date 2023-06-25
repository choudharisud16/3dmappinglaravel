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
    
    const scene = viewer.scene;
    /* viewer.dataSources.add(Cesium.GeoJsonDataSource.load('/js/countries.geojson', {
      stroke: Cesium.Color.HOTPINK,
      fill: Cesium.Color.PINK,
      strokeWidth: 3,
      markerSymbol: '?'
    })); */
    const promise = Cesium.GeoJsonDataSource.load(
      "/js/countries.geojson"
    );

    promise
    .then(function (dataSource) {
      viewer.dataSources.add(dataSource);

      //Get the array of entities
      const entities = dataSource.entities.values;
      console.log(entities);
      for (let i = 0; i < entities.length; i++) {
        //For each entity, create a random color based on the state name.
        //Some states have multiple entities, so we store the color in a
        //hash so that we use the same color for the entire state.
        const entity = entities[i];
        const name = entity.name;
        let color = Cesium.Color.fromCssColorString(entity.properties.REGIONCOLOR.getValue());
        //Set the polygon material to our random color.
        entity.polygon.material = color;
        //Remove the outlines.
        handler = new Cesium.ScreenSpaceEventHandler(scene.canvas);
          handler.setInputAction(function (movement) {
           const pickedObject = scene.pick(movement.endPosition);
           console.log(pickedObject);
            if (Cesium.defined(pickedObject) && pickedObject.id === entity) {
              entities.forEach((entity) => {
                                              if(entity.properties.REGIONCODE.getValue() 
                                                  === 
                                                  pickedObject.id.properties.REGIONCODE.getValue()){
                                                    entity.polygon.outline = true;
                                                    entity.polygon.outlineColor = Cesium.Color.fromCssColorString(entity.properties.HIGHLIGHTCOLOR.getValue());
                                                  }
                                              console.log({ entity });
                                            }
                              );
            } else {
              entity.polygon.outline = false;
            } 
            /* const feature = scene.pick(movement.endPosition);
            if (feature instanceof Cesium.Cesium3DTileFeature) {
                const propertyIds = feature.getPropertyIds();
                const length = propertyIds.length;
                for (let i = 0; i < length; ++i) {
                    const propertyId = propertyIds[i];
                    console.log(`{propertyId}: ${feature.getProperty(propertyId)}`);
                }
            } */
          }, Cesium.ScreenSpaceEventType.MOUSE_MOVE);
        //Extrude the polygon based on the state's population.  Each entity
        //stores the properties for the GeoJSON feature it was created from
        //Since the population is a huge number, we divide by 50.
      }
    })
    .catch(function (error) {
      //Display any errrors encountered while loading.
      window.alert(error);
    });
  </script>
 </div>
</body>
</html><?php /**PATH C:\Users\sudch\git\3dmappinglaravel\resources\views/helloworld.blade.php ENDPATH**/ ?>