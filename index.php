<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Neuro Diário</title>
</head>

<body style="height: 100%">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-3">
                        <img src="img/logo.png" alt="logo" width="250">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                                <?php if(isset($_GET['sucess'])){ 
                                    echo '<div style="color:green;padding-bottom:10px">' . $_GET['sucess'] . '</div>';
                                 } ?>
                            <?php if (isset($_GET['error'])) { ?>
                                <div style="color:red;padding-bottom:10px">
                                    Email e/ou senha incorretos.
                                </div>
                            <?php } ?>
                            <form class="form-signin" method="post" action="perfil.php">
                                <label for="email" class="sr-only">Endereço de email</label>
                                <input type="text" id="email" name="email" class="form-control mb-3" placeholder="Seu email" required autofocus="">
                                <label for="senha">Senha</label>
                                <input type="password" id="senha" name="senha" class="form-control mb-3" placeholder="Senha" required>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Não tem uma conta? <a href="signin.php" class="text-dark">Criar uma</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>