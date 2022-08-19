var myMap;
var lyrOSM;

$(document).ready(function () {
    // create map object
    myMap = L.map('map',  {center:[38.24738, 21.73919], zoom:15, zoomControl:false });

    //add basemap layer
    lyrOSM = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');
     myMap.addLayer(lyrOSM);

    var geocoder = L.Control.geocoder({//here we are making our own function in order to take specific elements from db search, find and make a marker to the element
        defaultMarkGeocode: true

    })
        .on('markgeocode', function(e) {
            var bbox = e.geocode.bbox;
            var poly = L.polygon([
                bbox.getSouthEast(),
                bbox.getNorthEast(),
                bbox.getNorthWest(),
                bbox.getSouthWest()
            ]).addTo(myMap);
            myMap.fitBounds(poly.getBounds());
        })
        .addTo(myMap);
        
    L.control.locate().addTo(myMap);
});
