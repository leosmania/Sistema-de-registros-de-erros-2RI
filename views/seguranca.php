<?php
function seguranca_adm(){
    if((empty($_SESSION['nome'])) || (empty($_SESSION['login'])) || (empty($_SESSION['permissao']))){       
        $_SESSION['loginErro'] = "Área restrita";
        header("Location: ..\index.php");
    }else{
        if($_SESSION['permissao'] != "Administracao"){
            $_SESSION['loginErro'] = "Área restrita";
            header("Location: ..\index.php");
        }
    }
}

function seguranca_colaborador(){
    if((empty($_SESSION['nome'])) || (empty($_SESSION['login'])) || (empty($_SESSION['permissao']))){       
        $_SESSION['loginErro'] = "Área restrita";
        header("Location: ..\index.php");
    }else{
        if($_SESSION['permissao'] != "Gestão"){
            $_SESSION['loginErro'] = "Área restrita";
            header("Location: ..\index.php");
        }
    }
}

function seguranca_cliente(){
    if((empty($_SESSION['nome'])) || (empty($_SESSION['login'])) || (empty($_SESSION['permissao']))){       
        $_SESSION['loginErro'] = "Área restrita";
        header("Location: ..\index.php");
    }else{
        if($_SESSION['permissao'] != "Usuario"){
            $_SESSION['loginErro'] = "Área restrita";
            header("Location: ..\index.php");
        }
        }
    }
?>
