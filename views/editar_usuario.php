<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location: ../index.php');
}

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
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-key"></i> Trocar
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
                    <p>Editar usuario</p>
                    <?php
                    include("../config/config.php");
                    $sql = "SELECT * FROM usuarios WHERE id=" . $_REQUEST["id"];
                    $res = $conn->query($sql);
                    $row = $res->fetch_object();


                    ?>
                    <form action="salvar_usuario.php" method="POST">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="id" value="<?php print $row->id; ?>">
                        <div class="mb-3">
                            <label for="">Nome</label>
                            <input type="text" name="nome" value="<?php print $row->nome;  ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Login</label>
                            <input type="text" name="login" value="<?php print $row->login;  ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Senha</label>
                            <input type="password" name="senha" value="<?php print $row->senha;  ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Setor</label>
                            <select name="setor" class="form-select" id="setor">
                                <option selected><?php print $row->setor; ?></option>
                                <option value="Atendimento">Atendimento</option>
                                <option value="Analise">Análise</option>
                                <option value="Registro">Registro</option>
                                <option value="Conferencia">Conferência</option>
                                <option value="Finalizacao">Finalização</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Permissão</label>
                            <select name="permissao" class="form-select" id="permissao">
                                <option selected><?php print $row->permissao;  ?></option>
                                <option value="Administracao">Administração</option>
                                <option value="Usuario">Usuário</option>
                            </select>
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