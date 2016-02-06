function initMap() {
  var client = {lat: -22.8946818, lng: -43.1188096};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: client
  });

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>André Dourado</b></br>' +
      '<p>Rua da Conceição, 188, Sala 704</br>' +
      'Niterói Shopping</br>'+
      'Centro - Niterói - RJ</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var marker = new google.maps.Marker({
    position: client,
    map: map,
    title: 'André Dourado'
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}
