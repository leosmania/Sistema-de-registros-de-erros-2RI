<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location: ../index.php');
}

$logado = $_SESSION['login'];
$nome = $_SESSION['nome'];
include("../config/config.php");
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $data = $_POST["data"];
        $data = implode("-", array_reverse(explode("/", $data)));
        $protocolo = $_POST["protocolo"];
        $colaborador = $_POST["colaborador"];
        $setor = $_POST["setor"];
        $erros = implode('<br>', $_POST['erros']);
        $obs = $_POST["obs"];
        $login = $logado;


        $sql = "INSERT INTO registros (data,protocolo,colaborador,setor,erros,obs,login) 
        VALUES ('{$data}', '{$protocolo}', '{$colaborador}', '{$setor}', '{$erros}', '{$obs}', '{$login}')";


        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso');</script>";
            print "<script>location.href='registrarg.php';</script>";
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
            print "<script>location.href='listagem_errosg.php';</script>";
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
            print "<script>location.href='listagem_erros.php';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href=?page=novo;</script>";
        }

        break;
    case 'desconsiderar':
        $sql = "SELECT * FROM registros AS retorno WHERE retorno.`id`=" . $_REQUEST["id"];
        $res = $conn->query($sql);
        $row = $res->fetch_object();

        if ($row->desconsiderar == 0) {
            $descon = 1;
            $sql =  "UPDATE registros SET 
                desconsiderar='{$descon}'
                WHERE 
                id=" . $_REQUEST["id"];

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Erro desconsiderado');</script>";
                print "<script>location.href='listagem_errosg.php';</script>";
            }
        } else {
            print "<script>alert('Esse erro já foi desconsiderado anteriormente, não é mais possível realizar esse ato.');</script>";
            print "<script>location.href='listagem_errosg.php';</script>";
        }

        break;
}
