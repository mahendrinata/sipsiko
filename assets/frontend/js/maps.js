function initialize() {
    var latlng = new google.maps.LatLng(-6.934018,107.621588);
    var settings = {
        zoom: 16,
        center: latlng,
        mapTypeControl: false,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyl
        },
        navigationControl: false,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL 
            //e.DROPDOWN_MENU
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    ;
    var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
    var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h2 id="firstHeading" class="firstHeading">SIPSIKO</h2>' +
            '<div id="bodyContent">' +
            '<p>This is a pop up. You can put here your text.</p>' +
            '</div>' +
            '</div>';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    var companyImage = new google.maps.MarkerImage('assets/frontend/img/marker.png',
            new google.maps.Size(70, 85),
            new google.maps.Point(0, 0),
            new google.maps.Point(35, 220)
            );
    var companyShadow = new google.maps.MarkerImage('assets/frontend/img/marker-shadow.png',
            new google.maps.Size(108, 56),
            new google.maps.Point(0, 0),
            new google.maps.Point(30, 190)
            );
    var companyPos = new google.maps.LatLng(-6.934018,107.621588);

    var companyMarker = new google.maps.Marker({
        position: companyPos,
        map: map,
        icon: companyImage,
        shadow: companyShadow,
        title: "SIPSIKO",
        zIndex: 3});

    google.maps.event.addListener(companyMarker, 'click', function() {
        infowindow.open(map, companyMarker);
    });
}