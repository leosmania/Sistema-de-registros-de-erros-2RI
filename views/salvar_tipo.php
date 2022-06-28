<?php
include("../config/config.php");
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $tipo_erro = $_POST["tipo_erro"];


        $sql = "INSERT INTO erros (erros) 
        VALUES ('{$tipo_erro}')";


        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso');</script>";
            print "<script>location.href='novo_erro.php';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href=?page=novo;</script>";
        }
        break;
    case 'cadastrarg':
        $tipo_erro = $_POST["tipo_erro"];


        $sql = "INSERT INTO erros (erros) 
            VALUES ('{$tipo_erro}')";


        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso');</script>";
            print "<script>location.href='novo_errog.php';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href=?page=novo;</script>";
        }
        break;

    case 'editar':
        $data = $_POST["data"];
        $data = implode("-", array_reverse(explode("/", $data)));
        $protocolo = $_POST["protocolo"];
        $colaborador = $_POST["colaborador"];
        $setor = $_POST["setor"];
        $erros = implode('<br>', $_POST['erros']);
        $obs = $_POST["obs"];

        $sql =  "UPDATE registros SET 
                            data='{$data}',
                            protocolo='{$protocolo}',
                            colaborador='{$colaborador}',
                            setor='{$setor}',
                            erros='{$erros}',
                            obs='{$obs}'
                            WHERE 
                            id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='listagem_erros.php';</script>";
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
