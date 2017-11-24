<div id="topo">
    <?php
        include("topo.php");
    ?>
</div>

<?php

?>

<div id="inicio">

    <h1>INTERFACE DE PROGRAMAÇÃO DE APLICATIVOS</h1>

    <br><br>
    <h3>Earth Polychromatic Imaging Camera API</h3>
    <br><br>
    <div id="dark">
        <div id="epic">
            <br><br><p>Latitude / Longitude</p><br>
        </div>
        <br><br>
        <img src="images/sat.gif">
    </div>
    <br>

    <p>
        A cada instante em que o satélite registra sua localização,
    </p>
    <p>
        um vetor iniciado em "0" é preenchido com as atuais coordenadas.
    </p>

    <br><br>
    <img src="images/NASA.png">
</div>
<br><br>

<div id="rodape">
    <?php
        include("rodape.php");
    ?>
</div>

<script>
    loadEpic()
</script>
