var map;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();
var harga = 3;

map = new google.maps.Map(document.getElementById('map'), {
    center: {
        lat: -2.655230390257819,
        lng: 120.9368947253499
    },
    zoom: 4
});
directionsDisplay.setMap(map);

var x = document.getElementById('start');
var searchStart = new google.maps.places.SearchBox(start);
var end = document.getElementById('end');
var searchEnd = new google.maps.places.SearchBox(end);

var detail = document.getElementById('detail');

var pesanStart = document.getElementById('pesan-btn');

function findRoute() {
    var startAddress = start.value;
    var endAddress = end.value;
    var request = {
        origin: startAddress,
        destination: endAddress,
        travelMode: 'DRIVING' //DRIVING, WALKING, BYCYCLING, TRANSIT
    };
    directionsService.route(request, function (result, status) {
        if (status == 'OK') {
            directionsDisplay.setDirections(result);
            // console.log(result);
            // console.log(result.routes[0].legs[0].distance.text);
            console.log(result.routes[0].legs[0].distance.value);

            $('#jarak').val(result.routes[0].legs[0].distance.text);
            $('#durasi').val(result.routes[0].legs[0].duration.text);
            $('#harga').val('Rp.' + ' ' + result.routes[0].legs[0].distance.value *
            harga);
            $('#hargaview').val('Rp.' + ' ' + result.routes[0].legs[0].distance.value *
            harga);

            document.getElementById('jarak').innerHTML = result.routes[0].legs[0].distance.text;
            document.getElementById('durasi').innerHTML = result.routes[0].legs[0].duration.text;
            document.getElementById('harga').innerHTML = 'Rp.' + ' ' + result.routes[0].legs[0].distance.value *
                harga;

            detail.style.display = 'block';
        } else {
            detail.style.display = 'none';
            alert('Petunjuk arah gagal dimuat, masukkan alamat yang benar!');
        }
    });
}

pesan.addEventListener("click", function (event) {
    if (start.value.trim() != "" && end.value.trim() != "") {
        // event.preventDefault();
        findRoute();
    }
});

const findMyLocation = () => {

    const end = document.querySelector('#end');

    const success = (position) => {
        console.log(position)
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        // const latlng = longitude + ', ' + latitude;
        // console.log(latlng)

        var requestOptions = {
            method: 'GET',
        };

        // const geoAPIUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`
        // const geoAPIUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg`
        const geoAPIUrl = `https://api.geoapify.com/v1/geocode/reverse?lat=${latitude}&lon=${longitude}&apiKey=b3a13d0d05374c9d811f0599860dc7b8`


        fetch (geoAPIUrl)
        .then(res => res.json())
        .then(data => {
            console.log(data)
            // console.log(data.features[0].properties.formatted);
            // $('#start').val(data.locality);
            $('#end').val(data.features[0].properties.address_line2);
        })
    }
    
    const error = () => {
        start.textContent = 'Unable to retrive your location';
    }

    navigator.geolocation.getCurrentPosition(success, error, {
        enableHighAccuracy: true,
        timeout: 5000,
    });

}

document.querySelector('#find-state').addEventListener('click', findMyLocation);