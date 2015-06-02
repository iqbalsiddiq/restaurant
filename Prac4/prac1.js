


    var icons = [
      'icon/red_MarkerA.png',
      'icon/red_MarkerB.png',
      'icon/red_MarkerC.png'
    ];
	var bounds;
    var iconsLength = icons.length;
	var marker;
	var markers = new Array();
	var pos;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
     
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 160
    });

   
    
   
    
    // Marker and icon
	if(wrong==false){
		
    for (var i = 0; i < locations.length; i++) {  
		marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,icon: locations[i][3],
		animation: google.maps.Animation.DROP,
	
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {

          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker); 
        }
      })(marker, i));
   
     if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
		pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
		
		codeLatLng(position.coords.latitude, position.coords.longitude)
		
	  
	  
		markers.push(pos);

		map.setCenter(pos);
			}, function() {
			handleNoGeolocation(true);
			});
		} 
		else 
		{
			// Browser doesn't support Geolocation
			handleNoGeolocation(false);
			
		}
				
	 
    }
		
	}else{
		if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
		pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
		
		codeLatLng(position.coords.latitude, position.coords.longitude)
		
	  
	  
		markers.push(pos);

		map.setCenter(pos);
			}, function() {
			handleNoGeolocation(true);
			});
		} 
		else 
		{
			// Browser doesn't support Geolocation
			handleNoGeolocation(false);
			
		}
	}
	
	

	
    
	google.maps.event.addDomListener(window, 'load', initialize);
	
	function handleNoGeolocation(errorFlag) {
		if (errorFlag) {
			var content = 'Error: The Geolocation service failed.';
		} else {
			var content = 'Error: Your browser doesn\'t support geolocation.';
			}

	}
	
	
	function codeLatLng(lat, lng) {
	geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         
        marker = new google.maps.Marker({
            position: latlng,
            map: map,
			animation: google.maps.Animation.BOUNCE
			
        });
			
        	document.getElementById('local').innerHTML=results[1].address_components[1].long_name;
			document.getElementById('local1').innerHTML=results[1].address_components[0].long_name;


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
	
	

	