<?php
include 'connect_db.php';
if (isset($_GET['sair']) && $_GET['sair'] == 'y') {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> <!-- Moved inline CSS to styles.css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neuro Diário</title>
</head>

<body style="height: 100%">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-3">
                        <img src="img/logo.png" alt="logo" class="logo">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h4 class="fs-4 card-title fw-bold mb-4">Login</h4>
                            <?php if (isset($_GET['error']) && $_GET['error'] == 'y') { ?>
                                <div style="color:red;padding-bottom:10px">
                                    Email e/ou senha incorretos.
                                </div>
                            <?php } elseif (isset($_GET['sucess']) && $_GET['sucess'] == 'y') { ?>
                                <div style="color:green;padding-bottom:10px">
                                    Conta criada com sucesso.
                                </div>
                            <?php } ?>
                            <form class="form-signin" method="post" action="connect_db.php">
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