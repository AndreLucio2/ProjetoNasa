<?php
    include("pdo.php");
?>

<div id="topo">
    <?php
        include("topo.php");
    ?>
</div>

<div id="inicio">
    <h1>Cadastre-se</h1>

    <div id="cadastro">
        <form method="POST" id="fcadastro" action="cadastro.php">
            <label for="login">Usuário:
                <input type="text" id="login" name="usuario" placeholder="Insira seu nome">
            </label><br>
            <label for="senha">Senha:
                <input type="password" id="senha" name="senha" >
            </label>
            <br>
            <label><input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" >
            </label>
            <label><input type="reset" id="reset" name="reset" value="Limpar">
            </label><br>
        </form>
    </div>

    <div id="alerts">
        <?php
        if(isset($_POST['usuario'])) {
            $login = $_POST['usuario'];
            $senha = $_POST['senha'];

            if ($login == "" || $login == null) {
                echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');</script>";
            } else {
                $query_select = "SELECT usuario FROM users WHERE usuario = '$login'";
                $select = $conn->query($query_select);
                $row = $select->fetch(PDO::FETCH_ASSOC);
                $logarray = $row['login'];


                if ($logarray == $login) {

                    echo "<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.php';</script>";
                    die();

                } else {
                    $query = "INSERT INTO users (usuario,senha) VALUES ('$login','$senha')";
                    $insert = $conn->query($query);
                    if ($insert) {
                        echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.php'</script>";
                    } else {
                        echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.php'</script>";
                    }
                }
            }
        }
        ?>
    </div>
    <br><br>

    <img src="images/earth2.png">
    <br><br>
</div>

<div id="rodape">
    <?php
        include("rodape.php");
    ?>
</div>
