<?php
date_default_timezone_set("America/Campo_Grande");

session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location: ../index.php');
}
    include_once("seguranca.php");
    seguranca_adm(); //para página com permissão adm

$logado = $_SESSION['login'];
$nome = $_SESSION['nome'];

include("../config/config.php");
header("Refresh:20");
$qtd_atendimento = 0;
$qtd_centrais = 0;
$qtd_registro = 0;
$qtd_analise = 0;
$qtd_conferencia = 0;
$qtd_finalizacao = 0;

$mes = date("m");
$sql = "SELECT * FROM registros WHERE MONTH(data) = '{$mes}'";

$res = $conn->query($sql);
$qtd = $res->num_rows;
if ($qtd > 0) {
    while ($row = $res->fetch_object()) {
        if ($row->setor == "Atendimento") {
            $qtd_atendimento++;
        }
        if ($row->setor == "Centrais") {
            $qtd_centrais++;
        }
        if ($row->setor == "Registro") {
            $qtd_registro++;
        }
        if ($row->setor == "Analise") {
            $qtd_analise++;
        }
        if ($row->setor == "Conferência") {
            $qtd_conferencia++;
        }
        if ($row->setor == "Finalização") {
            $qtd_finalizacao++;
        }
    }
}

$qtd_atendimento_dia = 0;
$qtd_centrais_dia = 0;
$qtd_registro_dia = 0;
$qtd_analise_dia = 0;
$qtd_conferencia_dia = 0;
$qtd_finalizacao_dia = 0;

$dia = date("d");
$sql = "SELECT * FROM registros WHERE DAY(data) = '{$dia}'";

$res = $conn->query($sql);
$qtd = $res->num_rows;
if ($qtd > 0) {
    while ($row = $res->fetch_object()) {
        if ($row->setor == "Atendimento") {
            $qtd_atendimento_dia++;
        }
        if ($row->setor == "Centrais") {
            $qtd_centrais_dia++;
        }
        if ($row->setor == "Registro") {
            $qtd_registro_dia++;
        }
        if ($row->setor == "Analise") {
            $qtd_analise_dia++;
        }
        if ($row->setor == "Conferência") {
            $qtd_conferencia_dia++;
        }
        if ($row->setor == "Finalização") {
            $qtd_finalizacao_dia++;
        }
    }
}
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
    <html>

    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Setores', 'Erros no mês atual'],
                    ['Atendimento', <?= $qtd_atendimento ?>],
                    ['Centrais', <?= $qtd_centrais ?>],
                    ['Registro', <?= $qtd_registro ?>],
                    ['Analise', <?= $qtd_analise ?>],
                    ['Conferência', <?= $qtd_conferencia ?>],
                    ['Finalização', <?= $qtd_finalizacao ?>]
                ]);

                var options = {
                    title: 'Erros por setor no mês atual'
                };

                var chart = new google.visualization.PieChart(document.getElementById('graf_mes'));

                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Setores', 'Erros no dia atual'],
                    ['Atendimento', <?= $qtd_atendimento_dia ?>],
                    ['Centrais', <?= $qtd_centrais_dia ?>],
                    ['Registro', <?= $qtd_registro_dia ?>],
                    ['Analise', <?= $qtd_analise_dia ?>],
                    ['Conferência', <?= $qtd_conferencia_dia ?>],
                    ['Finalização', <?= $qtd_finalizacao_dia ?>]
                ]);

                var options = {
                    title: 'Erros por setor no dia atual'
                };

                var chart = new google.visualization.PieChart(document.getElementById('graf_dia'));

                chart.draw(data, options);

            }
        </script>

    </head>

<body>
    <?php

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
                                    <a class="nav-link dropdown-toggle" href="trocar_senha.php" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <div class="main-conten">
                    <p>Dashboard</p>
                    <p><?php echo "Bem vindo $nome, hoje é: "; ?><?php echo date('d/m/Y'); ?></p>
                </div><?php

                        $sql = "SELECT * FROM registros AS retorno WHERE retorno.`desconsiderar` = '1'";
                        $res = $conn->query($sql);

                        $qtd_des = $res->num_rows;
                        if ($qtd_des > 0) {
                            print  "<p class='alert alert-danger'>Existem $qtd_des erros desconsiderados para analisar, clique <a href='desconsiderados.php' target='_blank'>aqui</a> para visualizá-los</p>";
                        }

                        ?>
                <div class="container px-4">
                    <div class="row gx-5">
                        <div class="col">
                            <div class="p-3 border bg-light">
                                <?php
                                $dia = date("d");

                                $sql = "SELECT * FROM registros WHERE DAY(data) = '{$dia}'";

                                $res = $conn->query($sql);

                                $qtd_dia = $res->num_rows;

                                print "<b>Erros registrados no dia atual:</b> $qtd_dia<br>";
                                $mes = date("m");

                                $sql = "SELECT * FROM registros WHERE MONTH(data) = '{$mes}'";

                                $res = $conn->query($sql);

                                $qtd_mes = $res->num_rows;

                                print "<b>Erros registrados no mês atual: </b>$qtd_mes";
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 border bg-light"><b>Erros por setor no mês atual:</b> <br><br>
                                <?php
                                print "<b>Atendimento: </b> $qtd_atendimento <br>";
                                print "<b>Centrais: </b>$qtd_centrais <br>";
                                print "<b>Registro: </b>$qtd_registro <br>";
                                print "<b>Analise: </b>$qtd_analise <br>";
                                print "<b>Conferência: </b>$qtd_conferencia <br>";
                                print "<b>Finalização: </b>$qtd_finalizacao <br>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container px-4">
                    <div class="row gx-5">
                        <div class="col">
                            <div class="p-3 border bg-light">
                                <div id="graf_mes" style="width: 400px; height: 300px;"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 border bg-light">
                                <div id="graf_dia" style="width: 400px; height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../plugins/fontawesome/js/all.min.js"></script>
</body>

</html>