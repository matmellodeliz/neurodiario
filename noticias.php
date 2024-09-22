<?php
include 'connect_db.php';
$nome = explode(" ", $_SESSION['nome']);
$nome = $nome[0];
?>
<!doctype html>
<html>
<title>Perfil</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin: auto;
        text-align: center;
        font-family: arial;
        margin-top: 10%;
        background-color: white;
        border-radius: 10px;
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
        background-color: #DDA0DD;
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
        <div style="padding: 15px 15px 5px 0;float:right">
      <a href="perfil.php" class="btn btn-secondary d-inline float-right" style="width: 75px;cursor: pointer;box-shadow: 0px 0px 2px gray;border: none;outline: none;padding: 5px;border-radius: 5px;font-size:16px;background-color: white"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
    </div>
    <iframe src="https://feed.mikle.com/widget/v2/167023/?preloader-text=Carregando...&" height="402px" width="100%" class="fw-iframe" scrolling="no" frameborder="0"></iframe>
        <!-- <iframe src="https://feed.mikle.com/widget/v2/167024/?preloader-text=Carregando&" height="148px" width="100%" class="fw-iframe" scrolling="no" frameborder="0"></iframe> -->
        <!-- <iframe src="https://feed.mikle.com/widget/v2/167024/?preloader-text=Carregando&" style="border-radius: 10px;" height="472px" width="100%" class="fw-iframe" scrolling="no" frameborder="0"></iframe> -->
        </div>
    </div>
    
</body>

</html>