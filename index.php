

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/all.css">
        <title>SCON</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous">
        <link rel="stylesheet" href="./plugins/fontawesome/css/all.min.css">
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <div class="login-form-wrapper">
                <form action="./views/valida.php" method="POST">
                        <div class="mb-3">
                            <label for="login" class="form-label">Usuário</label>
                            <input type="text" name="login" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
            <div class="banner-login">
                <img src="./images/2ricg.png" alt="">
                <h2>2º Registro de Imóveis de Campo Grande - MS</h2>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
        <script src="./plugins/fontawesome/js/all.min.js"></script>
    </body>
</html>