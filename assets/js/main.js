var reviewId;
window.addEventListener("load", init);

function init() {

  initMap();
  
}


function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function ClearFields() {
  document.getElementById("pac-input").value = "";
  
}

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13
  });

  var input = document.getElementById('pac-input');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var infowindowContent = document.getElementById('infowindow-content');
  infowindow.setContent(infowindowContent);
  var marker = new google.maps.Marker({
    map: map
  });
  marker.addListener('click', function () {
    infowindow.open(map, marker);
  });

  autocomplete.addListener('place_changed', function () {
    loadkeys();
    openkvk();
    

    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location.
    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });
    marker.setVisible(true);

    infowindowContent.children['place-name'].textContent = place.name;
    infowindowContent.children['place-id'].textContent = place.place_id;
    infowindowContent.children['place-address'].textContent =
      place.formatted_address;
    infowindow.open(map, marker);

    var reviewId = place.place_id;
    
    reviews(reviewId);
    
  });
}

function reviews(reviewId) {
  
console.log(reviewId);
jQuery(document).ready(function( $ ) { 
  
  $("#google-reviews").googlePlaces({
    placeId: reviewId //Find placeID @: https://developers.google.com/places/place-id
    , render: ['reviews']
    , min_rating: 4
    , max_rows: 4
    
  });
     
});
}

