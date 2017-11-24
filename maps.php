<div id="topo">
    <?php
    include("topo.php");
    ?>
</div>

<?php

?>

<div id="inicio">

    <h1>INTERFACE DE PROGRAMAÇÃO DE APLICATIVOS</h1>
    <br>
    <div id="google">
        <h3>Localização no Google Maps</h3>
        <div id="map"></div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWBv0Dl68qZS4MVz1QDpvYfD3cWqi-lzc&callback=initMap" async defer></script>

<div id="rodape">
    <?php
    include("rodape.php");
    ?>
</div>

<script>
    initMap()
</script>




