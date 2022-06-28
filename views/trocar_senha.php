<!DOCTYPE html>
<html lang="pt-br">
<?php 
    session_start();
    include_once("seguranca.php");
    seguranca_adm(); //para página com permissão adm

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <title>SCON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/fontawesome/css/all.min.css">
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/fontawesome/js/all.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <?php
    session_start();
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
        header('location: ../index.php');
    }

    $logado = $_SESSION['login'];
    $nome = $_SESSION['nome'];
    ?>
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
        case "salvar_tipo";
            include("salvar_tipo.php");
            break;
        case "alterar_senha";
            include("alterarsenha.php");
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
                        <a href="dashboard.php"><i class="fa-solid fa-house-chimney"></i> &nbsp;| &nbsp; </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="registrar.php"><i class="fa-solid fa-floppy-disk"></i> Registrar</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-list"></i> Listagem de erros
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="listagem_erros.php"><i class="fa-solid fa-user"></i> Listar por usuário</a>
                                        <a class="dropdown-item" href="listagem_setor.php"><i class="fa-solid fa-users-line"></i> Listar por setor</a>

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-gears"></i> Administrativo
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="trocar_senha.php"><i class="fa-solid fa-key"></i> Trocar
                                            senha</a>
                                        <a class="dropdown-item" href="criar_usuario.php"><i class="fa-solid fa-user-plus"></i></i> Criar
                                            usuário</a>
                                        <a class="dropdown-item" href=" listar_usuario.php"><i class="fa-solid fa-users"></i></i></i>
                                            Listar usuários</a>
                                        <a class="dropdown-item" href="novo_erro.php"><i class="fa-solid fa-plus"></i>
                                            Novo tipo de erro</a>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </header>
            <div class="main-content">

                <p><?php print "Olá $nome , aqui você pode alterar sua senha" ?></p>

                <form action="?page=alterar_senha" method="POST">
                    <input type="hidden" name="acao" value="alterar_senha">
                    <div class="mb-3">
                        <label for="">Nova Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </form>
            </div>
        </main>
    </div>

</body>

</html>