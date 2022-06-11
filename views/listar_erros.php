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
                        <a href="listar_usuario.php"><i class="fa-solid fa-users"></i>
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
                <a href="#"><i class="fa-solid fa-house-chimney"></i></a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i></a>
            </header>
            <div class="main-content fs-6 ">
                <div class="main-conten">
                    <p><i class="fa-solid fa-users"></i> Listar usuarios</p>

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
                            include("salvar_registro.php");
                            break;
                        case "editar";
                            include("editar_usuario.php");
                            break;
                    }
                    $sql = "SELECT * FROM registros";

                    $res = $conn->query($sql);

                    $qtd = $res->num_rows;

                    if ($qtd > 0) {
                        print "<table class='table table-sm align-middle table-hover table-striped table-bordered'>";
                        print "<tr>";
                        //print "<th>#</th>";
                        print "<th>Data</th>";
                        print "<th>Protocolo</th>";
                        print "<th>Colaborador</th>";
                        print "<th>Setor</th>";
                        print "<th>Tipos de Erros</th>";
                        print "<th>Observações</th>";
                        print "<th>Ações</th>";
                        print "</tr>";
                        while ($row = $res->fetch_object()) {
                            print "<tr>";
                           // print "<td>" . $row->id . "</td>";
                            print "<td>" . $row->data = implode("/",array_reverse(explode("-",$row->data))); "</td>";
                            print "<td>" . $row->protocolo . "</td>";
                            print "<td>" . $row->colaborador . "</td>";
                            print "<td>" . $row->setor . "</td>";
                            print "<td class='text-break'>" . $row->erros . "</td>";
                            print "<td class='text-break'>" . $row->obs . "</td>";
                            print "<td>
                   <button onclick=\"location.href='editar_erro.php?id=$row->id';\" class='btn btn-success'>Editar</button> 

                   <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id . "';}else{false}\" 
                   class='btn btn-danger'>Excluir</button> 
                   </td>";
                            print "</tr>";
                        }
                        print "</table>";
                    } else {
                        print  "<p class='alert alert-danger'>Não encontrou resultados!</p>";
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../plugins/fontawesome/js/all.min.js"></script>
</body>

</html>