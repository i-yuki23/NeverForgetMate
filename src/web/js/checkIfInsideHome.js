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
    
    var inside = yourLat >= homeData.southwest_lat &&
    yourLat <= homeData.northeast_lat &&
    yourLng >= homeData.southwest_lng &&
    yourLng <= homeData.northeast_lng;
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

document.querySelector('.js-check-button').addEventListener('click', function() {
    setInterval(checkIfInsideHome, 5000);
});
