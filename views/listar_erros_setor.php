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

    <div class="main-content fs-6 ">
        <div class="main-conten">
            <p><i class="fa-solid fa-users"></i> Listar erros | <i class="fa-solid fa-print"></i> </p>

            <?php
            include("../config/config.php");

            $data_inicial = $_POST['data_inicial'];
            $data_inicial = implode("-", array_reverse(explode("/", $data_inicial)));
            $data_final = $_POST['data_final'];
            $data_final = implode("-", array_reverse(explode("/", $data_final)));

            $sql = "SELECT * FROM registros AS retorno WHERE (retorno.`data` BETWEEN '$data_inicial' AND '$data_final') AND (retorno.`setor` = '$_POST[setor]')
            ORDER BY data, protocolo";

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
                    print "<td>" . $row->data = implode("/", array_reverse(explode("-", $row->data)));
                    "</td>";
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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
            <script src="../plugins/fontawesome/js/all.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>