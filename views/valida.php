<?php

require('../config/config.php');

$userIsSet = (!empty($_POST['login']) && isset($_POST['login']));
$passwdIsSet = (!empty($_POST['senha']) && isset($_POST['senha']));

if ($userIsSet && $passwdIsSet) {

    $USUARIO = $_POST['login'];
    $SENHA = md5($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE login='$USUARIO' AND senha='$SENHA'";
    $sql = $conn->query($sql) or die('Erro na query de index.php');

    $qtd = $sql->num_rows;
    if ($qtd == 1) {

        session_start();

        $resultado = $sql->fetch_assoc();

        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['login'] = $resultado['login'];
        $_SESSION['permissao'] = $resultado['permissao'];

        $permissao = $_SESSION['permissao'];

        if ($permissao == "Administracao") {
            header('Location: dashboard.php');
        }
        if ($permissao == "Usuario") {
            header('Location: listar_usuario.php');
        }
    } else {
        echo "Usuário não encontrado!";
        echo "<a href='index.php'>Voltar</a>";
        echo $USUARIO;
        echo $SENHA;
        exit();
    }
}
