<?php
    include("pdo.php");

/** ob_start();
    session_start();
    ini_set('default_charset','UTF-8'); */
?>

<?php

if(isset($_POST['entrar'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $entrar = $_POST['entrar'];
    $error = "Login inválido";

    try{
        $sql    = "SELECT * FROM users WHERE usuario = :usuario and senha = :senha";
        $stmt   = $conn->prepare($sql);
        $stmt->execute(array(":usuario" => $login, ":senha" => $senha));
        $user   = $stmt->fetch(PDO::FETCH_ASSOC);
        /*
         * [
         *   0 => [
         *      usuario => blablabla,
         *      senha => blebleble,
         *    ],
         * ]
         */

        if($user === false)
        {
            echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');</script>";
        }
        else
        {

            $_SESSION['login'] = $login;
            echo "<script>window.location = 'index.php';</script>";
            echo "<script language='javascript' type='text/javascript'>alert('Bem vindo $login!');</script>";

        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<div id="topo">
    <?php
        include("topo.php");
    ?>
</div>

<div id="inicio">
    <h1>Autenticação</h1>

    <div id="formLog">
        <form method="POST" id="log" action="login.php">
            <label for="login">Usuário:
                <input type="text" name="login" id="login" placeholder="Insira seu nome">
            </label><br>
            <label for="senha">Senha:
                <input type="password" name="senha" id="senha">
            </label><br>
            <label>
                <input type="submit" id="entrar" name="entrar" value="entrar">
            </label>
            <label>
                <input type="reset" id="reset" name="reset" value="Limpar">
            </label><br><br>
            <a href="cadastro.php">Cadastre-se</a>
        </form>
    </div>
    <br>

    <img src="images/earth2.png">
    <br><br>
</div>

<div id="rodape">
    <?php
        include("rodape.php");
    ?>
</div>






