<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $login = $_POST["login"];
            $senha = md5($_POST["senha"]);
            $permissao = $_POST["permissao"];


            $sql = "INSERT INTO usuarios (nome,login,senha,permissao) VALUES ('{$nome}', '{$login}', '{$senha}', '{$permissao}')";


            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar');</script>";
                print "<script>location.href=?page=novo;</script>";
            }
            break;
        
        case 'editar':
            $nome = $_POST["nome"];
            $login = $_POST["login"];
            $senha = md5($_POST["senha"]);
            $permissao = $_POST["permissao"];

            $sql =  "UPDATE usuarios SET 
                            nome='{$nome}',
                            login='{$login}',
                            senha='{$senha}',
                            permissao='{$permissao}'
                            WHERE 
                            id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível editar');</script>";
                print "<script>location.href=?page=novo;</script>";
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href=?page=novo;</script>";
            }

            break;
    }
