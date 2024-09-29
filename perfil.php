<?php
session_start();
$nome = explode(" ", $_SESSION['nome']);
$nome = $nome[0];
?>
<!doctype html>
<html>
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Perfil</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
<title>Perfil</title>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        font-family: arial;
        margin-top: 15%;
        background-color: white;
        border-radius: 5px;
    }

    .title {
        color: grey;
        font-size: 18px;
    }

    .button {
        border: none;
        outline: 0;
        display: inline-block;
        color: black;
        background-color: #F0EAD6;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        padding: 10px 0 10px 0;
    }

    a {
        text-decoration: none;
        font-size: 22px;
        color: black;
    }

    button:hover,
    a:hover {
        opacity: 0.7;
    }
</style>
</head>

<body style="background-color: #DDA0DD;">

    <div class="col-sm-6">
        <div class="card">
        <img src="<?= $_SESSION['avatar'] ?>" id="profilePreview" style="border-radius: 50%; min-height:150px; max-height:150px; max-width:150px; min-width: 150px; margin-top:-15%; background-color: white; padding: 6px;">
        <br>
            <table style="height: 70px; width:100%">
                <tbody>
                    <tr>
                        <td><a href="configuracoes.php" class="btn btn-secondary d-inline float-left"><i class="fa-solid fa-user-gear"></i></a></td>
                        <td class="align-middle">
                            <h3></i><b><span class="d-inline" style="padding-left: 5%;">Bem vindo(a), <?= $nome ?>!</span></b></h3>
                        </td>
                        <td><a href="index.php" class="btn btn-secondary d-inline float-right"><i class="fa-solid fa-right-from-bracket"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <div class="row" style="padding-bottom: 1px;">
                    <a href="calendario/calendario.php" class="button">
                        <i class="fa-solid fa-book fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 0 10px"></i>
                        <span>Diário</span>
                    </a>
                </div>
                <div class="row" style="padding-bottom: 1px;">
                    <a href="noticias.php" class="button">
                        <i class="fa-solid fa-newspaper fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 9px"></i>
                        <span>Notícias</span>
                    </a>

                </div>
                <div class="row">
                    <a href="informacoes.php" class="button">
                        <i class="fa-solid fa-laptop-medical fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>
                        <span>Informações</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>