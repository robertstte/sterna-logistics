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

function showOrderUbication(departureLat, departureLng, arrivalLat, arrivalLng, mapDivId) {
    const departure = { lat: departureLat, lng: departureLng };
    const arrival = { lat: arrivalLat, lng: arrivalLng };

    const map = new google.maps.Map(document.getElementById(mapDivId), {
        zoom: 4,
        center: departure,
        mapId: "STERNA_MAP_ID" // A Map ID is required for Advanced Markers
    });

    // Marker for the origin point
    new google.maps.marker.AdvancedMarkerElement({
        map: map,
        position: departure,
        title: 'Origin'
    });

    // Custom marker for the destination point
    const pinGlyph = new google.maps.marker.PinElement({
        glyph: 'D',
        glyphColor: 'white',
        background: '#FF6B00', // Using a brand color
        borderColor: 'white',
    });

    new google.maps.marker.AdvancedMarkerElement({
        map: map,
        position: arrival,
        title: 'Destination',
        content: pinGlyph.element,
    });

    // Create a straight line (Polyline) between the two points
    const directPath = new google.maps.Polyline({
        path: [departure, arrival],
        geodesic: true, // Makes the line follow the curve of the Earth
        strokeColor: '#0d6efd',
        strokeOpacity: 0.8,
        strokeWeight: 2.5
    });

    directPath.setMap(map);

    // Adjust map bounds to show both markers and the line
    const bounds = new google.maps.LatLngBounds();
    bounds.extend(departure);
    bounds.extend(arrival);
    map.fitBounds(bounds);
}