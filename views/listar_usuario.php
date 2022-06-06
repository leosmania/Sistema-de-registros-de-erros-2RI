<h1>Listar usuarios</h1>

<?php
    $sql = "SELECT * FROM usuarios";
    
    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Login</th>";
        print "<th>Permissao</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>" .$row->id. "</td>";
            print "<td>" .$row->nome. "</td>";
            print "<td>" .$row->login. "</td>";
            print "<td>" .$row->permissao. "</td>";
            print "<td>
                   <button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn btn-success'>Editar</button> 

                   <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false}\" 
                   class='btn btn-danger'>Excluir</button> 
                   </td>"; 
            print "</tr>";
        }
        print "</table>";
    }else{
        print  "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }
?>