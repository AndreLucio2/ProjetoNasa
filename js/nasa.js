
/**
 * Created by AndreLucio on 01/11/2017.

*/

const apodUrl = 'https://api.nasa.gov/planetary/apod?api_key=o124N1j4hysqR5dVUVWT5qIiAVzvdYWHf7nYYqYK';
const epicUrl = 'https://epic.gsfc.nasa.gov/api/natural';
const mapsUrl = 'https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml';
const neoUrl  = "https://api.nasa.gov/neo/rest/v1/feed?end_date=2017-11-21&detailed=true&api_key=o124N1j4hysqR5dVUVWT5qIiAVzvdYWHf7nYYqYK";

// Astronomy Picture Of Day

function loadApod() {

    $.ajax({
        url: apodUrl,
        success: function (result) {
            if ("copyright" in result) {
                $("#copyright").text("Image Credits: " + result.copyright);
            }
            else {
                $("#copyright").text("Image Credits: " + "Public Domain");
            }

            if (result.media_type == "video") {
                $("#apod_img_id").css("display", "none");
                $("#apod_vid_id").attr("src", result.url);
            }
            else {
                $("#apod_vid_id").css("display", "none");
                $("#apod_img_id").attr("src", result.url);
            }
            $("#reqObject").text(apod);
            $("#returnObject").text(JSON.stringify(result, null, 4));
            $("#apod_explaination").text(result.explanation);
            $("#apod_title").text(result.title);
        }
    });
}


// Google Maps

/**function loadMaps() {*/

    var customLabel = {
        Apontador: {
            label: 'P'
        }
    };

function initMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -21.777951, lng: -43.3490383},
        zoom: 15
    });
}

    var infoWindow = new google.maps.InfoWindow;

    downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function (markerElem) {
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
            });
            marker.addListener('click', function () {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
        });
    });

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {}


// Earth coordenadas


function showData($element, json){
    json.forEach(function(epic, i) {
        const coords = epic.coords;
    const centroidCoords = coords.centroid_coordinates;
    $element.innerText += `${i}: lat ${centroidCoords.lat} lon ${centroidCoords.lon}\n`;
    })
}

function loadEpic() {
    $.ajax(epicUrl, {
        success: function(json){
            const $epicResults = document.getElementById('epic');
            showData($epicResults, json)
        }
    })
}
loadEpic(epicUrl);



