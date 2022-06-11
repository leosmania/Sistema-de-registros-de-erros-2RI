<?php
include("../config/config.php");


if (isset($_POST['user']) || isset($_POST['senha'])) {

    if (strlen($_POST['user'] == 0)) {
        echo "Preencha o login";
    } else if (strlen($_POST['senha'] == 0)) {
        echo "Preencha sua senha";
    } else {

        $login = $conn->real_escape_string($_POST['login']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE user = '$login' AND senha = '$senha' LIMIT 1";
        $res = $conn->query($sql) or die();

        $qtd = $res->num_rows;

        $login = $res->fetch_assoc();

        if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome'] = $login['nome'];
            $_SESSION['permissao'] = $login['permissao'];

            header("Location: dashboard.php");


    }
}

?>