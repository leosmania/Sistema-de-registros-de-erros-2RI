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
                <h2>Registro de Erros</h2>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="#"><i class="fa-solid fa-floppy-disk"></i>
                            Registrar</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-list"></i> Listar</a>
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
            </div>
        </sidebar>
        <main>
            <header>
                <a href="dashboard.php"><i class="fa-solid fa-house-chimney"></i></a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i></a>
            </header>
            <div class="main-content">
                <div class="main-conten">
                    <p>Novo Registro</p>
                </div>
                <form action="salvar_registro.php" method="POST">
                    <input type="hidden" name="acao" value="cadastrar">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm">
                                <label for="">Data</label>
                                <input type="date" name="data" class="form-control">
                            </div>
                            <div class="col-sm">
                                <label for="">Protocolo</label>
                                <input type="text" name="protocolo" class="form-control">
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
                        <select name="erros[]" class="form-select" multiple aria-label="multiple select example">
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
                    <div class="mb-3">
                        <label for="obs" class="form-label">Observações/Consequências:</label>
                        <textarea class="form-control" name="obs" id="obs" rows="3"></textarea>
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