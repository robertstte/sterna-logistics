function showFormPassword()
{
    const loginPassword = document.getElementById("login-password");
    const loginTogglePassword = document.getElementById('login-toggle-password')

    if (loginPassword.type === "password") {
        loginPassword.type = "text";
        loginTogglePassword.src = loginTogglePassword.getAttribute("data-eye-off");
    } else {
        loginPassword.type = "password";
        loginTogglePassword.src = loginTogglePassword.getAttribute("data-eye");
    }
}

var currentStep = 1;

function nextStep(step) 
{
    document.getElementById("step-content" + step).classList.add("step-hidden");
    document.getElementById("step-content" + (step + 1)).classList.remove("step-hidden");

    document.getElementById("step" + step).classList.add("form-step");
    document.getElementById("step" + step).classList.remove("form-step-active");
    
    document.getElementById("step" + (step + 1)).classList.remove("form-step");
    document.getElementById("step" + (step + 1)).classList.add("form-step-active");

    currentStep++;
}

function previousStep(step) {
    document.getElementById("step-content" + step).classList.add("step-hidden");
    document.getElementById("step-content" + (step - 1)).classList.remove("step-hidden");
}

function onMapsReady()
{
    document.querySelectorAll(".map-ubication").forEach(showMap);
    console.log(1);
}

function showMap(mapDiv)
{
    const departureLat = parseFloat(mapDiv.dataset.departureLat);
    const departureLng = parseFloat(mapDiv.dataset.departureLng);
    const arrivalLat = parseFloat(mapDiv.dataset.arrivalLat);
    const arrivalLng = parseFloat(mapDiv.dataset.arrivalLng);

    if (isNaN(departureLat) || isNaN(departureLng) || isNaN(arrivalLat) || isNaN(arrivalLng)) {
        return;
    }

    showOrderUbication(departureLat, departureLng, arrivalLat, arrivalLng, mapDiv.id);
}

function showOrderUbication(departureLat, departureLng, arrivalLat, arrivalLng, mapDivId)
{
    const departure = { lat: departureLat, lng: departureLng };
    const arrival = { lat: arrivalLat, lng: arrivalLng };

    let marker;
    let step = 0;
    let routeCoords = [];

    const map = new google.maps.Map(document.getElementById(mapDivId), {
        zoom: 11,
        center: departure
    });

    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();

    directionsRenderer.setMap(map);

    directionsService.route(
        { origin: departure, destination: arrival, travelMode: google.maps.TravelMode.DRIVING },
        (response, status) => {
            if (status === "OK") {
                directionsRenderer.setDirections(response);
                const path = response.routes[0].overview_path;

                const polyline = new google.maps.Polyline({
                    path: path,
                    geodesic: true,
                    strokeColor: "#0000FF",
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
                polyline.setMap(map);

                routeCoords = path;
                marker = new google.maps.Marker({
                    position: path[0],
                    map: map,
                    icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
                });
                moveMarker();
            }
        }
    );

    function moveMarker()
    {
        if (step >= routeCoords.length) return;
        marker.setPosition(routeCoords[step]);
        step++;
        setTimeout(moveMarker, 1000);
    }
}