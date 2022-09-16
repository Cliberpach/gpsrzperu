map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: { lat: -5.19449, lng: -80.63282 },
    gestureHandling: "greedy",
    zoomControl: false,
    mapTypeControl: true,
    streetViewControl: false,
    fullscreenControl: false,
});
const carrera = document.getElementById("carrera");
map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(carrera);
const leyenda = document.getElementById("leyenda");
map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(leyenda);



$("#myInput").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});
