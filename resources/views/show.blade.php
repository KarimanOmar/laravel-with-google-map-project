<html>
  <head>
    <title>Simple Polygon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<style>
    /*
 * Always set the map height explicitly to define the size of the div element
 * that contains the map.
 */
#map {
    height: 80%;
  width: 80%;
}

/*
 * Optional: Makes the sample page fill the window.
 */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
.titleForm{
    font-family: Raleway;

}
.gm-style .controls {
  font-size: 28px; /* this adjusts the size of all the controls */
  background-color: white;
  box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
  box-sizing: border-box;
  border-radius: 2px;
  cursor: pointer;
  font-weight: 300;
  height: 1em;
  margin: 6px;
  text-align: center;
  user-select: none;
  padding: 2px;
  width: 1em;
}

.gm-style .controls button {
  border: 0;
  background-color: white;
  color: rgba(0, 0, 0, 0.6);
}

.gm-style .controls button:hover {
  color: rgba(0, 0, 0, 0.9);
}

.gm-style .controls.zoom-control {
  display: flex;
  flex-direction: column;
  height: auto;
}

.gm-style .controls.zoom-control button {
  font: 0.85em Arial;
  margin: 1px;
  padding: 0;
}

.gm-style .controls.maptype-control {
  display: flex;
  flex-direction: row;
  width: auto;
}

.gm-style .controls.maptype-control button {
  display: inline-block;
  font-size: 0.5em;
  margin: 0 1px;
  padding: 0 6px;
}

.gm-style .controls.maptype-control.maptype-control-is-map .maptype-control-map {
  font-weight: 700;
}

.gm-style .controls.maptype-control.maptype-control-is-satellite .maptype-control-satellite {
  font-weight: 700;
}

.gm-style .controls.fullscreen-control button {
  display: block;
  font-size: 1em;
  height: 100%;
  width: 100%;
}

.gm-style .controls.fullscreen-control .fullscreen-control-icon {
  border-style: solid;
  height: 0.25em;
  position: absolute;
  width: 0.25em;
}

.gm-style .controls.fullscreen-control .fullscreen-control-icon.fullscreen-control-top-left {
  border-width: 2px 0 0 2px;
  left: 0.1em;
  top: 0.1em;
}

.gm-style .controls.fullscreen-control.is-fullscreen .fullscreen-control-icon.fullscreen-control-top-left {
  border-width: 0 2px 2px 0;
}

.gm-style .controls.fullscreen-control .fullscreen-control-icon.fullscreen-control-top-right {
  border-width: 2px 2px 0 0;
  right: 0.1em;
  top: 0.1em;
}

.gm-style .controls.fullscreen-control.is-fullscreen .fullscreen-control-icon.fullscreen-control-top-right {
  border-width: 0 0 2px 2px;
}

.gm-style .controls.fullscreen-control .fullscreen-control-icon.fullscreen-control-bottom-left {
  border-width: 0 0 2px 2px;
  left: 0.1em;
  bottom: 0.1em;
}

.gm-style .controls.fullscreen-control.is-fullscreen .fullscreen-control-icon.fullscreen-control-bottom-left {
  border-width: 2px 2px 0 0;
}

.gm-style .controls.fullscreen-control .fullscreen-control-icon.fullscreen-control-bottom-right {
  border-width: 0 2px 2px 0;
  right: 0.1em;
  bottom: 0.1em;
}

.gm-style .controls.fullscreen-control.is-fullscreen .fullscreen-control-icon.fullscreen-control-bottom-right {
  border-width: 2px 0 0 2px;
}
</style>

  </head>
  <body>
  <h2 class='text-center titleForm m-5 ' >Thank You</h2>

  <div class='mx-auto' id="map"></div>
  <div class='container p-3'>
  <div class="mx-auto card shadow-lg  mb-5  rounded " style="width: 82%;">
  <div class="card-header ">
    <h4 >Your Data</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item d-flex row m-0 p-2">
        <h6 class='col-4 m-0'>First name :</h5>
            <p class='col-4 m-0'>{{$farmlands[count($farmlands)-1] -> firstname}}</p>
    </li>
    <li class="list-group-item d-flex row m-0 p-2">
        <h6 class='col-4 m-0'>Last name :</h5>
            <p class='col-4 m-0'>{{$farmlands[count($farmlands)-1] -> lastname}}</p>
    </li>
    <li class="list-group-item d-flex row m-0 p-2">
        <h6 class='col-4 m-0'>Company name :</h5>
            <p class='col-4 m-0'>{{$farmlands[count($farmlands)-1] -> companyname}}</p>
    </li>
    <li class="list-group-item d-flex row m-0 p-2">
        <h6 class='col-4 m-0'>Address :</h5>
            <p class='col-4 m-0'>{{$farmlands[count($farmlands)-1] -> address}}</p>
    </li>
    <li class="list-group-item d-flex row m-0 p-2">
        <h6 class='col-4 m-0'>Email :</h5>
            <p class='col-4 m-0'>{{$farmlands[count($farmlands)-1] -> email}}</p>
    </li>
    <li class="list-group-item d-flex row m-0 p-2">
        <h6 class='col-4 m-0'>Phone :</h5>
            <p class='col-4 m-0'>{{$farmlands[count($farmlands)-1] -> phone}}</p>
    </li>
    <li class="list-group-item d-flex row m-0 p-2">
        <h6 class='col-4 m-0'>Additional information :</h5>
            <p class='col-4 m-0'>{{$farmlands[count($farmlands)-1] -> additionalinformation}}</p>
    </li>


  </ul>
</div>
</div>
    <!--
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
      </div>
    <!-- Hide controls until they are moved into the map. -->
    <div style="display: none">
      <div class="controls zoom-control">
        <button class="zoom-control-in" title="Zoom In">+</button>
        <button class="zoom-control-out" title="Zoom Out">−</button>
      </div>
      <div class="controls maptype-control maptype-control-is-map">
        <button class="maptype-control-map" title="Show road map">Map</button>
        <button
          class="maptype-control-satellite"
          title="Show satellite imagery"
        >
          Satellite
        </button>
      </div>
      <div class="controls fullscreen-control">
        <button title="Toggle Fullscreen">
          <div
            class="fullscreen-control-icon fullscreen-control-top-left"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-top-right"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-bottom-left"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-bottom-right"
          ></div>
        </button>
      </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApiMdK1ud3Ex0Jt6JntjgDePcgll6bvag&callback=initMap&v=weekly"
      defer
    >
</script>

<script>
    // This example creates a simple polygon representing the Bermuda Triangle.
    let map;
function initMap() {
  var latDrowingPoints = [{{$farmlands[count($farmlands)-1]['farmlandLat']}}]
  var lngDrowingPoints = [{{$farmlands[count($farmlands)-1]['farmlandLng']}}]
  console.log(latDrowingPoints);
  console.log(lngDrowingPoints);
  var arr = []
  for (let index = 0; index < latDrowingPoints.length; index++) {
    arr.push({ lat: latDrowingPoints[index], lng: lngDrowingPoints[index] });

  }
  console.log(arr);
  map = new google.maps.Map(document.querySelector("#map"), {
    center: arr[2],
    zoom: 15,
    disableDefaultUI: true,
    mapTypeId: "terrain",
  });
  initZoomControl(map);
  initMapTypeControl(map);
  initFullscreenControl(map);
  // Define the LatLng coordinates for the polygon's path.

  const triangleCoords = arr

//   {{$farmlands[count($farmlands)-1]['farmlandLat']}};
  console.log(triangleCoords);
  // Construct the polygon.
  const bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: "#FF0000",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#FF0000",
    fillOpacity: 0.35,
  });

  bermudaTriangle.setMap(map);
}



function initZoomControl(map) {
  document.querySelector(".zoom-control-in").onclick = function () {
    map.setZoom(map.getZoom() + 1);
  };

  document.querySelector(".zoom-control-out").onclick = function () {
    map.setZoom(map.getZoom() - 1);
  };

  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
    document.querySelector(".zoom-control"),
  );
}

function initMapTypeControl(map) {
  const mapTypeControlDiv = document.querySelector(".maptype-control");

  document.querySelector(".maptype-control-map").onclick = function () {
    mapTypeControlDiv.classList.add("maptype-control-is-map");
    mapTypeControlDiv.classList.remove("maptype-control-is-satellite");
    map.setMapTypeId("roadmap");
  };

  document.querySelector(".maptype-control-satellite").onclick = function () {
    mapTypeControlDiv.classList.remove("maptype-control-is-map");
    mapTypeControlDiv.classList.add("maptype-control-is-satellite");
    map.setMapTypeId("hybrid");
  };

  map.controls[google.maps.ControlPosition.LEFT_TOP].push(mapTypeControlDiv);
}

function initFullscreenControl(map) {
  const elementToSendFullscreen = map.getDiv().firstChild;
  const fullscreenControl = document.querySelector(".fullscreen-control");

  map.controls[google.maps.ControlPosition.RIGHT_TOP].push(fullscreenControl);
  fullscreenControl.onclick = function () {
    if (isFullscreen(elementToSendFullscreen)) {
      exitFullscreen();
    } else {
      requestFullscreen(elementToSendFullscreen);
    }
  };

  document.onwebkitfullscreenchange =
    document.onmsfullscreenchange =
    document.onmozfullscreenchange =
    document.onfullscreenchange =
      function () {
        if (isFullscreen(elementToSendFullscreen)) {
          fullscreenControl.classList.add("is-fullscreen");
        } else {
          fullscreenControl.classList.remove("is-fullscreen");
        }
      };
}

function isFullscreen(element) {
  return (
    (document.fullscreenElement ||
      document.webkitFullscreenElement ||
      document.mozFullScreenElement ||
      document.msFullscreenElement) == element
  );
}

function requestFullscreen(element) {
  if (element.requestFullscreen) {
    element.requestFullscreen();
  } else if (element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  } else if (element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if (element.msRequestFullScreen) {
    element.msRequestFullScreen();
  }
}

function exitFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}


window.initMap = initMap;
        </script>

  </body>
</html>
