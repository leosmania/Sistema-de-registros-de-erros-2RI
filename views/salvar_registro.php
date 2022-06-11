<?php
include("../config/config.php");
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $data = $_POST["data"];
        $data = implode("-",array_reverse(explode("/",$data)));
        $protocolo = $_POST["protocolo"];
        $colaborador = $_POST["colaborador"];
        $setor = $_POST["setor"];
        $erros = implode('<br>', $_POST['erros']);
        $obs = $_POST["obs"];


        $sql = "INSERT INTO registros (data,protocolo,colaborador,setor,erros,obs) 
        VALUES ('{$data}', '{$protocolo}', '{$colaborador}', '{$setor}', '{$erros}', '{$obs}')";


        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso');</script>";
            print "<script>location.href='registrar.php';</script>";
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
            print "<script>location.href='listar_usuario.php';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href=?page=novo;</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM registros WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='listar_erros.php';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href=?page=novo;</script>";
        }

        break;
}
