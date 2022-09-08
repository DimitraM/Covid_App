$(document).ready(function () {
    // create map object
    var myMap = L.map('map',  {center:[38.24738, 21.73919], zoom:15, zoomControl:false });

    //add basemap layer
    var lyrOSM = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');
     myMap.addLayer(lyrOSM);

     // arrays of pois that we got from mysql
     // var pois_arr=[];
     var pois_arr=[];
     var pop_times_arr=[];


    $("#search_btn").on('click', function() {
            var input = $("#search_input").val();//get value

            $.post("php/fetch_pop_times.php",{suggestion: input}, // post to get data from popular times
            function(data,status){
            let pop_times =JSON.parse(data);
            // console.log(data);
            pop_times.forEach(function(time_row){// pairnoume enan pinaka me oles tis plhrofories gia ta pois pou mas endiaferoun ssxetika me ton xrono kai to popularity
              pop_times_arr.push(time_row);

            });
          });

            $.post("php/fetch_types.php", { suggestion: input}, // get data from types as pois
            function(data,status){
              let result = JSON.parse(data);

              result.forEach(function(pois){
                let popularity =0;
                pop_times_arr.forEach(function(pop)
                {
                  if(pop["Pois_id"]== pois["idPois"])
                  {
                    popularity += pop["popularity"];
                  }
                });

                //ftiaxnoume markers analoga me thn hmera pou exoume kai thn wra poy ginetai h klhsh sthn vash +2 wres meta
                var d = new Date();
                let time_now = d.getHours()//gets current time between 0-23
                // let day = weekday[d.getDay()];

                pop_times_arr.forEach(function(time) {
                  let percentage = Math.round((time["popularity"]/ popularity)*100);

                    if(time["time"]== time_now || time["time"]== time_now +1 || time["time"]== time_now +2 && time["Pois_id"]== pois["idPois"])
                    {
                      var LeafIcon = L.Icon.extend({
                        options: {
                          autoPanOnFocus: true,
                          iconSize: [25, 41]
                        }
                      });
                      var greenIcon = new LeafIcon({iconUrl: 'my-pin-green.png'}),
                      redIcon = new LeafIcon({iconUrl: 'my-pin-red.png'}),
                      orangeIcon = new LeafIcon({iconUrl: 'my-pin-orange.png'});

                      L.icon = function (options) {
                        return new L.Icon(options);
                      };

                      if(percentage >=0 && percentage <=32)
                      {
                        console.log(percentage);

                        console.log("1h if");

                        var green_marker= L.marker([pois['Latitude'],pois['Longitude']],{icon: greenIcon}).addTo(myMap);
                        myMap.panTo([pois['Latitude'],pois['Longitude']]);
                        var content = $('<button class="btn btn-outline-info btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Καταχώρηση Επίσκεψης</button>');

                        green_marker.bindPopup(content.click(function() {
                          alert("ΣΥΝΑΙΝΕΙΣ ΝΑ ΑΠΟΘΗΚΕΥΤΟΥΝ ΤΑ ΣΤΟΙΧΕΙΑ ΣΟΥ ΣΤΗ ΒΑΣΗ ΔΕΔΟΜΕΝΩΝ?");
                        })[0]);


                      }
                      else if(percentage >=33 && percentage <=65)
                      {
                        console.log(percentage);
                        console.log("2h if");

                      var orange_marker= L.marker([pois['Latitude'],pois['Longitude']],{icon: orangeIcon}).addTo(myMap);
                      myMap.panTo([pois['Latitude'],pois['Longitude']]);
                      var content = $('<button class="btn btn-outline-info btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Καταχώρηση Επίσκεψης</button>');

                      orange_marker.bindPopup(content.click(function() {
                        alert("ΣΥΝΑΙΝΕΙΣ ΝΑ ΑΠΟΘΗΚΕΥΤΟΥΝ ΤΑ ΣΤΟΙΧΕΙΑ ΣΟΥ ΣΤΗ ΒΑΣΗ ΔΕΔΟΜΕΝΩΝ?");
                      })[0]);

                      }
                      else if(percentage >=66)
                      {
                        console.log(percentage);
                        console.log("3h if");

                      var red_marker= L.marker([pois['Latitude'],pois['Longitude']],{icon: redIcon}).addTo(myMap);
                      myMap.panTo([pois['Latitude'],pois['Longitude']]);
                      var content = $('<button class="btn btn-outline-info btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Καταχώρηση Επίσκεψης</button>');

                      red_marker.bindPopup(content.click(function() {
                        alert("ΣΥΝΑΙΝΕΙΣ ΝΑ ΑΠΟΘΗΚΕΥΤΟΥΝ ΤΑ ΣΤΟΙΧΕΙΑ ΣΟΥ ΣΤΗ ΒΑΣΗ ΔΕΔΟΜΕΝΩΝ?");
                      })[0]);

                      }

                    }
                });

              });
            });

          });




      // erwthma 2
      L.control.locate({
              initialZoomLevel : 15,
              strings:{
               title: "I am here !!!"}
             }).addTo(myMap);




});
