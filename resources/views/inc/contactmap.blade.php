<div class="mx-2">
    <div class="row" style="margin: -19px 5px 0px 5px; border: solid 10px rgba(0, 0, 0, 0);">
        <!-- Google Maps -->
        <div id="googleMap" style="width:100%;height:420px;"></div>
        <script>
        function myMap()
        {
        myCenter=new google.maps.LatLng(51.6775764,-3.2261402);
        var mapOptions= {
            center:myCenter,
            zoom:13, scrollwheel: false, draggable: false, //to see street make zoom 17
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

        var marker = new google.maps.Marker({
            position: myCenter,
        });
        marker.setMap(map);
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM0ERWi_9VlGshhy902l6opsLkwYDWGBo&callback=myMap"></script>
    </div>
</div>