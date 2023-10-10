<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 80%;
  width: 80%;
}
.titleForm{
    font-family: Raleway;

}
.regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
}
/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
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
    @yield('welcome')
    @yield('create')
    <!-- @yield('show') -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApiMdK1ud3Ex0Jt6JntjgDePcgll6bvag&callback=initMap&v=weekly"
      defer
    ></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApiMdK1ud3Ex0Jt6JntjgDePcgll6bvag&callback=initMap&libraries=drawing&v=weekly"
      defer
    ></script>
    <script>
        let map;

function initMap() {
  map = new google.maps.Map(document.querySelector("#map"), {
    center: {lat: -34.30650755256097, lng: 150.92581343549884},
    zoom: 15,
    disableDefaultUI: true,
  });
  initZoomControl(map);
  initMapTypeControl(map);
  initFullscreenControl(map);
  const drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: google.maps.drawing.OverlayType.MARKER,
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: [
        google.maps.drawing.OverlayType.MARKER,
        google.maps.drawing.OverlayType.CIRCLE,
        google.maps.drawing.OverlayType.POLYGON,
        google.maps.drawing.OverlayType.POLYLINE,
        google.maps.drawing.OverlayType.RECTANGLE,
      ],
    },
    markerOptions: {
      icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
    },
    circleOptions: {
      fillColor: "#ffff00",
      fillOpacity: 1,
      strokeWeight: 5,
      clickable: false,
      editable: true,
      zIndex: 1,
    },
  });
   var shapLat = []
   var shapLng = []
  drawingManager.setMap(map);
  console.log(drawingManager);
  google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
    console.log(polygon.getPaths().g[0].g);
   polygon.getPaths().g[0].g.forEach((item)=>{
    console.log(item.lat());
    console.log(item.lng());
    // shap.push({lat: item.lat(), lng: item.lng()})
    shapLat.push( item.lat())
    shapLng.push( item.lng())
  });
console.log(shapLat);
   var inputLat = document.getElementById("form6ExampleLat")
   var inputLng = document.getElementById("form6ExampleLang")
   inputLat.value = `${shapLat}`
   inputLng.value = `${shapLng}`
});
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
