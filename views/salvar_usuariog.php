<?php
include("../config/config.php");
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = md5($_POST["senha"]);
        $setor = $_POST["setor"];
        $permissao = $_POST["permissao"];


        $sql = "INSERT INTO usuarios (nome,login,senha,setor,permissao) VALUES ('{$nome}', '{$login}', '{$senha}', '{$setor}', '{$permissao}')";
        $sql2 = "INSERT INTO colaboradores (nome) VALUES ('{$nome}')";

        $res = $conn->query($sql);
        $res2 = $conn->query($sql2);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso');</script>";
            print "<script>location.href='listar_usuariog.php';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href=?page=novo;</script>";
        }
        break;

    case 'editar':
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = md5($_POST["senha"]);
        $setor = $_POST["setor"];
        $permissao = $_POST["permissao"];

        $sql =  "UPDATE usuarios SET 
                            nome='{$nome}',
                            login='{$login}',
                            senha='{$senha}',
                            setor='{$setor}',
                            permissao='{$permissao}'
                            WHERE 
                            id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='listar_usuariog.php';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href=?page=novo;</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='listar_usuariog.php';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href=?page=novo;</script>";
        }

        break;
}
