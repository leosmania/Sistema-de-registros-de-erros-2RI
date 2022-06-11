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
    <div class="flex-dashboard">
        <sidebar>
            <div class="sidebar-title">
                <img src="../images/2ricg.png" alt="">
            </div>
           <!-- <div class="menu">
                <ul>
                    <li>
                        <a href="registrar.php"><i class="fa-solid fa-floppy-disk"></i>
                            Registrar</a>
                    </li>
                    <li>
                        <a href="listagem_erros.php"><i class="fa-solid fa-list"></i> Listar</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-key"></i> Trocar
                            senha</a>
                    </li>
                    <li>
                        <a href="criar_usuario.php"><i class="fa-solid fa-user-plus"></i></i> Criar
                            usuário</a>
                    </li>
                    <li>
                        <a href="listar_usuario.php"><i class="fa-solid fa-users"></i></i></i>
                            Listar usuários</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-plus"></i>
                            Novo tipo de erro</a>
                    </li>
                </ul>
            </div>-->
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
                                <li class="nav-item">
                                    <a class="nav-link" href="listagem_erros.php"><i class="fa-solid fa-list"></i> Listar</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-gears"></i> Administrativo
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-key"></i> Trocar
                                            senha</a>
                                        <a class="dropdown-item" href="criar_usuario.php"><i class="fa-solid fa-user-plus"></i></i> Criar
                                            usuário</a>
                                        <a class="dropdown-item" href=" listar_usuario.php"><i class="fa-solid fa-users"></i></i></i>
                                            Listar usuários</a>
                                        <a class="dropdown-item" href="novo_erro.php""><i class="fa-solid fa-plus"></i>
                                            Novo tipo de erro</a>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="main-content">
                <div class="main-conten">
                    <p>Editar erro</p>
                    <?php
                    include("../config/config.php");
                    $sql = "SELECT * FROM registros WHERE id=" . $_REQUEST["id"];
                    $res = $conn->query($sql);
                    $row = $res->fetch_object();


                    ?>
                    <form action="salvar_registro.php" method="POST">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="id" value="<?php print $row->id; ?>">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="">Data</label>
                                    <input type="date" name="data" value="<?php print $row->data;  ?>" class="form-control">
                                </div>
                                <div class="col-sm">
                                    <label for="">Protocolo</label>
                                    <input type="text" name="protocolo" value="<?php print $row->protocolo;  ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="">Colaborador</label>
                                    <select class="form-select" name="colaborador" onkeypress="return handleEnter(this, event)" id="colaborador">
                                        <?php
                                        include("config.php");

                                        $resultado = "SELECT * FROM usuarios order by nome ASC";
                                        $resultado = mysqli_query($conn, $resultado);
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo ("<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>");
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="">Setor</label>
                                    <select name="setor" class="form-select" id="setor">
                                        <?php
                                        include("config.php");

                                        $resultado = "SELECT * FROM setor order by setores ASC";
                                        $resultado = mysqli_query($conn, $resultado);
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo ("<option value='" . $row['setores'] . "'>" . $row['setores'] . "</option>");
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="">Erros</label>
                            <select name="erros[]" class="form-select" multiple aria-label="multiple select example" ">
                                <?php
                                include("config.php");

                                $resultado = "SELECT * FROM erros order by erros ASC";
                                $resultado = mysqli_query($conn, $resultado);
                                while ($row = mysqli_fetch_array($resultado)) {
                                    echo ("<option value='" . $row['erros'] . "'>" . $row['erros'] . "</option>");
                                }
                                ?>
                            </select>
                            <small>Segure ctrl para selecionar mais de um</small>
                        </div>
                        <div class=" mb-3">
                                <label for="obs" class="form-label">Observações/Consequências:</label>
                                <textarea class="form-control" name="obs" id="obs" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../plugins/fontawesome/js/all.min.js"></script>
</body>

</html>