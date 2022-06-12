<?php
 switch ($_REQUEST["acao"]) {
    case 'editar':
        $senha = md5($_POST["senha"]);

        $sql =  "UPDATE usuarios SET 
                            senha='{$senha}'
                            WHERE 
                            login = '{$logado}'";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='home_user.php';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href=?page=novo;</script>";
        }
        break;
 }
 
