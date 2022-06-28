<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location: ../index.php');
}


include_once("seguranca.php");
seguranca_cliente(); // para nível publico ou cliente

$logado = $_SESSION['login'];
$nome = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <title>SCON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/fontawesome/css/all.min.css">
</head>

<body>
    <?php
    include("../config/config.php");
    switch (@$_REQUEST["page"]) {
        case "novo":
            include("novo_usuario.php");
            break;
        case "listar";
            include("listar_usuario.php");
            break;
        case "salvar";
            include("salvar_usuario.php");
            break;
        case "editar";
            include("editar_usuario.php");
            break;
    }
    ?>
    <div class="flex-dashboard">
        <sidebar>
            <div class="sidebar-title">
                <img src="../images/2ricg.png" alt="">
            </div>

        </sidebar>
        <main>
            <header>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <a href="home_user.php"><i class="fa-solid fa-house-chimney"></i> &nbsp;| &nbsp; </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="registrar_user.php"><i class="fa-solid fa-floppy-disk"></i> Registrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="listar_user.php"> <i class="fa-solid fa-list"></i> Listagem de erros</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-gears"></i> Administrativo
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="trocar_senha_user.php"><i class="fa-solid fa-key"></i> Trocar
                                            senha</a>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="main-content">
                <div class="main-conten">
                <p><?php print ("Olá $nome")?></p>    
                <p>Buscar Registro</p>
                </div>
                <form target="_blank" action="listar_erros_user.php" method="POST">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm">
                                <label for="">Data Inicial</label>
                                <input type="date" name="data_inicial" class="form-control">
                            </div>
                            <div class="col-sm">
                                <label for="">Data Final</label>
                                <input type="date" name="data_final" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label for="">Colaborador</label>
                                <select class="form-select" name="colaborador" onkeypress="return handleEnter(this, event)" id="colaborador">
                                    <?php
                                    include("config.php");
                                    echo ("<option value='" . $nome . "'>" . $nome . "</option>");
                                    
                                    ?>
                                </select>
                            </div>

                    </div>
                    <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>

                </form>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../plugins/fontawesome/js/all.min.js"></script>
</body>

</html>