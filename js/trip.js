let iconObject = L.icon({
    iconUrl: './src/images/marker-icon.png',
    shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
});

$(document).ready(function (e) {
    jQuery.support.cors = true;

    let host;// = "http://localhost:9000/api/1";
    let key = "372ef590-cf07-4aff-8c56-ef34bcb0ead3";

    // create a routing client to fetch real routes, elevation.true is only supported for vehicle bike or foot
    let ghRouting = new GraphHopper.Routing({key: key, host: host}, {elevation: false});

    let routingMap = createMap('routing-map');
    setupRoutingAPI(routingMap, ghRouting);
    
});

function setupRoutingAPI(map, ghRouting) {
    map.setView([parseFloat(orig_lat), parseFloat(orig_lng)],14);

    let points = []
    let instructionsDiv = $("#instructions");        

    points.push([parseFloat(orig_lng), parseFloat(orig_lat)]); //origine
    points.push([parseFloat(dest_lng), parseFloat(dest_lat)]); //destination
    if (points.length > 1) {
        // ******************
        //  Calculate route! 
        // ******************
        ghRouting.doRequest({points: points})
            .then(function (json) {
                let path = json.paths[0];
                routingLayer.addData({
                    "type": "Feature",
                    "geometry": path.points
                });



                //time calculation
                path.time /= 1000;
                

                var h = Math.floor(path.time / 3600);
                if (h > 0) {
                    path.time -= (3600 * h);
                }

                var m = Math.floor(path.time / 60);
                if (m > 0) {
                    path.time -= (60 * m);
                }

                var s = Math.floor(path.time);


                
                //timeHTML += ' (' + path.distance +'m)';
                let timeHTML = "";

                if (h > 0) {
                    timeHTML += h +'hr ';
                    if (m > 0) {
                        timeHTML += m+ 'min ';
                    }
                }
                else if (m > 0) {
                    timeHTML += m+ 'min ';
                    if (s > 0) {
                        timeHTML += s+ 'sec ';
                    }
                }

                else {
                    timeHTML += s + 'sec ';
                }


                //distance calculation
                var km = Math.floor(path.distance / 1000);
                if (path.distance > 0) {
                    path.distance /= 1000;
                    timeHTML += '(' + Math.round(path.distance * 100) / 100 + "km)";
                }
                else {
                    timeHTML += '(' + Math.round(path.distance) / 100 + "km)";
                    
                }
                $("#time").html(timeHTML);

        
                
                

                if (path.bbox) {
                    let minLon = path.bbox[0];
                    let minLat = path.bbox[1];
                    let maxLon = path.bbox[2];
                    let maxLat = path.bbox[3];
                    let tmpB = new L.LatLngBounds(new L.LatLng(minLat, minLon), new L.LatLng(maxLat, maxLon));
                    map.fitBounds(tmpB);
                }

                instructionsDiv.empty();
                if (path.instructions) {
                    let allPoints = path.points.coordinates;
                    let listUL = $("<ol>");
                    instructionsDiv.append(listUL);
                    for (let idx in path.instructions) {
                        let instr = path.instructions[idx];

                        // use 'interval' to find the geometry (list of points) until the next instruction
                        let instruction_points = allPoints.slice(instr.interval[0], instr.interval[1]);

                       

                        $("<li class='my-2'>" + instr.text + " for " + instr.distance + "m" + "</li>").appendTo(listUL);
                    }
                }

            })
            .catch(function (err) {
                let str = "An error occured: " + err.message;
                $("#routing-response").text(str);
            });
    }
    
    let routingLayer = L.geoJson().addTo(map);
    routingLayer.options = {
        style: {color: "#00ffff", "weight": 5, "opacity": 0.6}
    };

    L.marker(L.latLng(parseFloat(orig_lat), parseFloat(orig_lng)), {icon: iconObject}).addTo(routingLayer); //origin marker
    L.marker(L.latLng(parseFloat(dest_lat), parseFloat(dest_lng)), {icon: iconObject}).addTo(routingLayer); //destination marker
}

function createMap(divId) {
    let osmAttr = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

    let omniscale = L.tileLayer.wms('https://maps.omniscale.net/v1/ghexamples-3646a190/tile', {
        layers: 'osm',
        attribution: osmAttr + ', &copy; <a href="http://maps.omniscale.com/">Omniscale</a>'
    });

    let osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: osmAttr
    });

    let map = L.map(divId, {layers: [osm]});
    L.control.layers({
        "Omniscale": omniscale,
        "OpenStreetMap": osm
    }).addTo(map);
    return map;
}

