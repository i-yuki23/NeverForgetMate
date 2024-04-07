// const x = document.getElementById("demo");

// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else { 
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//     latitude = position.coords.latitude; // 緯度を変数に保存
//     longitude = position.coords.longitude; // 経度を変数に保存

//     // 保存した緯度と経度を使用してHTMLを更新
//     x.innerHTML = "Latitude: " + latitude + "<br>Longitude: " + longitude;
// }
var x = document.getElementById("demo");

function checkIfInsideHome() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showIsInside, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showIsInside(position) {

    x.innerHTML = isInside(position) ? "You are inside your home." : "You are outside your home.";
}

function isInside(position) {
    var yourLat = position.coords.latitude;
    var yourLng = position.coords.longitude;
    
    var inside = yourLat >= homeData.viewport.southwest.lat &&
    yourLat <= homeData.viewport.northeast.lat &&
    yourLng >= homeData.viewport.southwest.lng &&
    yourLng <= homeData.viewport.northeast.lng;
    return inside;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}