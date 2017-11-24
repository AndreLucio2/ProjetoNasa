<div id="topo">
    <?php
        include("topo.php");
    ?>
</div>

<div id="inicio">

    <h1>INTERFACE DE PROGRAMAÇÃO DE APLICATIVOS</h1>
    <br>
    <div id="apod">
        <h3>Astronomy Picture of the Day</h3>
        <br><br>
        <img id="apod_img_id" width="800px" align="center"/>

        <iframe id="apod_vid_id" type="text/html" width="1280" height="770" frameborder="0"></iframe>
        <p id="copyright"></p>

        <h3 id="apod_title"></h3>
        <p id="apod_explaination"></p>
        <br>
    </div>

    <br><br>
    <img src="images/NASA.png">
</div>

<div id="rodape">
    <?php
        include("rodape.php");
    ?>
</div>

<script>
     loadApod()
</script>
