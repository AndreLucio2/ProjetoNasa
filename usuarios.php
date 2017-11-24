<?php
include("pdo.php");
/**
    $select = "SELECT usuario FROM users";
    $result = $conn->query($select);
    $new_row = array($select);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $usuario = $row["usuario"];
        $new_row = array($usuario);
    }
*/


?>

<div id="topo">
    <?php
        include("topo.php");
    ?>
</div>

<div id="inicio">
    <br>
    <h1>INTERFACE DE PROGRAMAÇÃO DE APLICATIVOS</h1>
    <br>

    <div id="users">
            <h2>Usuários</h2>
            <br>
            <?php
            $rs = $conn->query("SELECT usuario FROM users");
            while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                echo $row->usuario . "<br />";
            }
            ?>
    </div>
    <br><br>

    <div id="logo">
        <h3>Página principal</h3>
        <br>
        <h4>
            Projeto desenvolvido em container Docker, utilizando linguagem PHP para teste de proficiência em estágio.
        </h4>
        <br>
        <p>
            A página consome APIs oficiais da NASA e da Google Maps, com as coordenadas locais da rua Machado Sobrinho. Além de realizar cadastro dos usuários em uma base de dados.
        </p>
        <p>
            Utiliza-se do banco de dados MySQL, do gerenciador de dados "Adminer". E também da  biblioteca "PDO API".
        </p>
        <p>
            A utilização do PDO fornece uma camada de abstração em relação a conexão com o banco de dados visto que o PDO efetua a conexão com diversos bancos de dados da mesma maneira, modificando apenas a sua string de conexão.
        </p>
        <br><br>
        <p>
            A aba usuários fornece uma lista com todos os usuários na base de dados e qualquer outra informação que seja solicitada.
        </p>

    </div>
    <br><br>

    <img src="images/earth2.png">
</div>

<div id="rodape">
    <?php
        include("rodape.php");
    ?>
</div>
