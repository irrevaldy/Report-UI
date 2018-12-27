@extends('layout')

@section('content')

<script>
  // FontAwesomeConfig = { searchPseudoElements: true };
</script>
<style type="text/css">
    .widget-info .left svg {
        border-radius: 50%;
        color: #ffffff;
        font-size: 45px;
        padding: 8px;
        text-align: center;
    }

    .widget-icon {
        float: right;
    }
    .widget-icon .icon {
        /*color: #18A689;*/
        /*fill: currentcolor;*/
        font-size: 20px;
        height: 67px;
        /*left: 80%;*/
        /*position: absolute;*/
        top: 13px;
        width: 67px;
        opacity: 0.1;
        filter: blur(1px);
    }

    .icon.master-icon {
        color: #18A689;
        fill: currentcolor;
    }

    .icon.template-icon {
        color: #4584D1;
        fill: currentcolor;
    }

    .icon.terminal-icon {
        color: #C9625F;
        fill: currentcolor;
    }

    .main-content .page-content .panel-content {
        padding: 10px 20px 10px;
    }

    .tile_stats_count .count {
        font-size: 40px;
        /*font-weight: 600;*/
        line-height: 47px;
        font-weight: normal;
    }

    .tile_stats_count .right {
        height: 100%;
        overflow: hidden;
        padding-left: 10px;
        text-overflow: ellipsis;
    }

    .tile_stats_count .right span {
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .count_bottom i {
        width: 12px;
    }

    .blue {
        color: #2CA3DE;
    }

    .green {
        color: #1abb9c;
    }

    .red {
        color: #e74c3c;
    }

    .yellow {
        color: #DBDB27;
    }

    .orange {
        color: #DEA92C;
    }

    .tile_stats_count {
      border-top: 1px solid #ddd;
      padding-top: 10px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
    }

    .tile_stats_count .left {
        border-left: 2px solid #adb2b5;
        float: left;
        height: 65px;
        margin-top: 10px;
        width: 15%;
    }

    .main-content .page-content .panel {
        border-left: 0px solid #666;
    }

    .panel-header {
        border-bottom: 1px solid #d6d6d6;
    }

    .main-content .page-content .panel.transparent {
      background: transparent;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0);
    }

    /*f1b2*/
</style>
<!--<style type="text/css">
   #map {
     width: 700px;
     height: 400px;
   }
 </style>-->
 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
	<?php
		// dd(session()->all());
	?>
  <div class="header panel-header" style="border-bottom: none;">
      <h2><i class="fas fa-globe"></i> <strong>Terminal Location</strong></h3>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel no-bd bd-3 panel-stat">
          <div class="panel-header" style="display:none" >
              <h3><i class="icon-graph"></i> <strong>List of Report &ensp;</strong></h3>
              <div class="control-btn">
                  <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
                  <!--<a class="hide-loading" style="display: none">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
                    <span> Loading...</span>
                  </a>-->
              </div>
          </div>
          <div class="panel-body p-15 p-b-0">
              <div class="panel-content widget-info">
                  <div id="map" style="width: 100%;height: 425px"></div>
                  <br>

          </div>
      </div>

    </div>
  </div>
</div>



@endsection

@section('javascript')


<script src="{{ asset('assets/plugins/gmaps/markerclusterer.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0_yidovdfBKc6l6MwgpvS3Aa01aIEzZc&callback=initMap"></script>

<script>
  var map;

  // var wirecard = {lat: -6.242322, lng: 106.851162};
  // var tis = {lat: -6.242557, lng: 106.848346};
  // var idm_kal_lapan = {lat: -6.341285, lng: 106.862094};
  // var idm_empang = {lat: -6.158332, lng: 106.787602};
  // var rusun_bandar = {lat: -6.136452, lng: 106.846024};
  // var kebon_kacang = {lat: -6.193516, lng: 106.820623};
  // var batan = {lat: -6.289938, lng: 106.771066};
  // var fatmawati = {lat: -6.280891, lng: 106.796218};
  // var kayu_tinggi = {lat: -6.182935, lng: 106.945717};
  // var warung_kasmat = {lat: -6.252546, lng: 106.773272};
  // var praja_dalam = {lat: -6.250864, lng: 106.783530};
  // var green_palace = {lat: -6.257407, lng: 106.849841};
  // var latumenten = {lat: -6.150099, lng: 106.794603};
  // var buaran = {lat: -6.220041, lng: 106.920212};
  // var kramat_jaya = {lat: -6.117529, lng: 106.916892};
  // var tanjung_duren = {lat: -6.180034, lng: 106.783371};
  // var plumpang = {lat: -6.129669, lng: 106.901153};
  // var kstubun = {lat: -6.192682, lng: 106.805506};
  // var lebak_bulus = {lat: -6.296443, lng: 106.786833};
  // var marina_raya = {lat: -6.112005, lng: 106.746233};

  function initMap()
  {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -6.175436, lng: 106.827210},
      zoom: 11,
      //nightmode map
      /*styles: [
           {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
           {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
           {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
           {
             featureType: 'administrative.locality',
             elementType: 'labels.text.fill',
             stylers: [{color: '#d59563'}]
           },
           {
             featureType: 'poi',
             elementType: 'labels.text.fill',
             stylers: [{color: '#d59563'}]
           },
           {
             featureType: 'poi.park',
             elementType: 'geometry',
             stylers: [{color: '#263c3f'}]
           },
           {
             featureType: 'poi.park',
             elementType: 'labels.text.fill',
             stylers: [{color: '#6b9a76'}]
           },
           {
             featureType: 'road',
             elementType: 'geometry',
             stylers: [{color: '#38414e'}]
           },
           {
             featureType: 'road',
             elementType: 'geometry.stroke',
             stylers: [{color: '#212a37'}]
           },
           {
             featureType: 'road',
             elementType: 'labels.text.fill',
             stylers: [{color: '#9ca5b3'}]
           },
           {
             featureType: 'road.highway',
             elementType: 'geometry',
             stylers: [{color: '#746855'}]
           },
           {
             featureType: 'road.highway',
             elementType: 'geometry.stroke',
             stylers: [{color: '#1f2835'}]
           },
           {
             featureType: 'road.highway',
             elementType: 'labels.text.fill',
             stylers: [{color: '#f3d19c'}]
           },
           {
             featureType: 'transit',
             elementType: 'geometry',
             stylers: [{color: '#2f3948'}]
           },
           {
             featureType: 'transit.station',
             elementType: 'labels.text.fill',
             stylers: [{color: '#d59563'}]
           },
           {
             featureType: 'water',
             elementType: 'geometry',
             stylers: [{color: '#17263c'}]
           },
           {
             featureType: 'water',
             elementType: 'labels.text.fill',
             stylers: [{color: '#515c6d'}]
           },
           {
             featureType: 'water',
             elementType: 'labels.text.stroke',
             stylers: [{color: '#17263c'}]
           }
         ]*/
      //scaleControl: false,
      //draggable: false
    });

    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    //var marker = new google.maps.Marker({position: wirecard, map: map});
    /*
    var locations = [];
    var locations = [
      {lat: wirecard.lat, lng: wirecard.lng},
      {lat: tis.lat, lng: tis.lng},
      {lat: idm_kal_lapan.lat, lng: idm_kal_lapan.lng},
      {lat: idm_empang.lat, lng: idm_empang.lng},
      {lat: rusun_bandar.lat, lng: rusun_bandar.lng},
      {lat: kebon_kacang.lat, lng: kebon_kacang.lng},
      {lat: batan.lat, lng: batan.lng},
      {lat: fatmawati.lat, lng: fatmawati.lng},
      {lat: kayu_tinggi.lat, lng: kayu_tinggi.lng},
      {lat: warung_kasmat.lat, lng: warung_kasmat.lng},
      {lat: praja_dalam.lat, lng: praja_dalam.lng},
      {lat: green_palace.lat, lng: green_palace.lng},
      {lat: latumenten.lat, lng: latumenten.lng},
      {lat: buaran.lat, lng: buaran.lng},
      {lat: kramat_jaya.lat, lng: kramat_jaya.lng},
      {lat: tanjung_duren.lat, lng: tanjung_duren.lng},
      {lat: plumpang.lat, lng: plumpang.lng},
      {lat: kstubun.lat, lng: kstubun.lng},
      {lat: lebak_bulus.lat, lng: lebak_bulus.lng},
      {lat: marina_raya.lat, lng: marina_raya.lng}
    ];
    console.log(locations);
*/

  $(function(){
        $.ajax({
          dataType: 'JSON',
          type: 'GET',
          url: '/get_terminal_location',
          success: function (data) {
            locations = data;
            total = data.length;
            console.log(locations);
            console.log(total);

            var markers = locations.map(function(location, i) {

              var contentString = '<div id="content">'+
              '<bold><h2 id="firstHeading" class="firstHeading">'+ locations[i]['name'] +'</h2></bold>'+
              '<div id="bodyContent">'+
              'Address: ' + locations[i]['taddress'] +'<br>'+
              'Last Transaction: ' + locations[i]['last_transaction'] +'<br>'+
              'SN: ' + locations[i]['sn'] +'<br>'+
              'EDC Type: ' + locations[i]['edctype'] +'<br>'+
              'App Version: ' + locations[i]['appver'] +'<br>'+
              '</div>'+
              '</div>';

              var infowindow = new google.maps.InfoWindow({
                content: contentString
              });

              if(locations[i]['date_diff_active'] <= 7)
              {
                if(locations[i]['date_diff_active_trx'] <= 7)
                {
                  var marker = new google.maps.Marker({
                    position: location,
                    //label: labels[i % labels.length],
                    map: map,
                    icon: 'storage/m/green.png'
                  });
                }
                else
                {
                  var marker = new google.maps.Marker({
                    position: location,
                    //label: labels[i % labels.length],
                    map: map,
                    icon: 'storage/m/yellow.png'
                  });
                }
              }
              else
              {
                var marker = new google.maps.Marker({
                  position: location,
                  //label: labels[i % labels.length],
                  map: map,
                  icon: 'storage/m/red.png'
                });
              }

              marker.addListener('mouseover', function() {
                infowindow.open(map, marker);
              });

              marker.addListener('mouseout', function() {
                infowindow.close();
              });

              return marker;


            });
          }
        });
      });



/*  var markerCluster = new MarkerClusterer(map, markers,
    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});*/
  }


</script>
   <!--<script src="{{ asset('assets/plugins/gmaps/gmaps.js') }}"></script>
     <script src="{{ asset('assets/plugins/gmaps/api.js') }}"></script>
    <script>


         var map = new GMaps({
           el: '#map',
           lat: -12.043333,
           lng: -77.028333
         });


       </script>-->

    <!--<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>-->
         @endsection
