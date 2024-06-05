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
                <a href="perfil.php" class="btn btn-secondary d-inline float-right" style="width: 75px;cursor: pointer;box-shadow: 0px 0px 2px gray;border: none;outline: none;padding: 5px;border-radius: 5px;font-size:16px"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </div>
            <div style="width:100%;">
                <table style="text-align: left; padding: 50px 10px 30px 10px;">
                    <thead>
                        <th></th>
                        <th>O que é epilepsia?</th>
                    </thead>
                    <tbody>
                        <tr><td>teste</td>
                            <td> Uma condição crônica do cérebro que causa convulsões recorrentes.
                                As convulsões são súbitas explosões de atividade elétrica anormal no cérebro que podem causar alterações na consciência, comportamento ou movimento.
                                Embora a epilepsia possa ser desafiadora, é importante lembrar que ela não define quem você é. Com tratamento adequado,
                                a maioria das pessoas com epilepsia pode viver uma vida plena e saudável.</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</body>

</html>