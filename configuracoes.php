<?php
include 'connect_db.php';
$erroEnvio = '';
if (isset($_GET['erroEnvio']) && $_GET['erroEnvio'] == 'y') $erroEnvio =  "<script>alert('Erro no envio. Você está mandando uma imagem? Se sim, cuidado com o tamanho.');</script>";
?>

<!doctype html>
<html>
<title>Perfil</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Configurações</title>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 500px;
        margin: auto;
        text-align: center;
        font-family: arial;
        margin-top: 10%;
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
<?php
echo $erroEnvio;
$_GET['erroEnvio'] = '';
?>
</head>

<body style="background-color: #DDA0DD;">

    <div class="col-sm-6">
        <div class="card">
            <img src="<?= $_SESSION['avatar'] ?>" id="profilePreview" style="border-radius: 50%; min-height:150px; max-height:150px; max-width:150px; min-width: 150px; margin-top:-15%; background-color: white; padding: 6px;">
            <br>

            <div class="container">
                <div class="row" style="padding-bottom: 0px;">
                    <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                        <label class="button" for="profileImage"><i class="fa-solid fa-id-badge fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>Trocar foto de perfil?</label><br>
                        <input type="file" id="profileImage" name="profileImage" hidden accept="image/*"><br>
                        <button class="button" type="submit"><i class="fa-solid fa-check fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>Salvar</button>
                    </form>
                </div>
                <h4><i class="fa-solid fa-lock fa-sm mr-4 col-sm-6"></i> Trocar de senha?</h4>
                <?php if (isset($_GET['error']) && $_GET['error'] == 'nova_senha') { ?>
                                <div style="color:red;padding-bottom:10px">
                                    Senha deve ter ao menos 6 caracteres.
                                </div>
                            <?php } 
                            elseif (isset($_GET['error']) && $_GET['error'] == 'senha_atual') { ?>
                                <div style="color:red;padding-bottom:10px">
                                    Senha atual incorreta.
                                </div>
                            <?php } 
                            elseif (isset($_GET['sucess']) && $_GET['sucess'] == 'y') { ?>
                                <div style="color:green;padding-bottom:10px">
                                    Senha trocada com sucesso.
                                </div>
                            <?php } ?>
                <form method="post" action="nova_senha.php">
                    <div class="form-group">
                        <label for="senha_atual">Senha atual:</label>
                        <input style="border-radius: 5px;" type="password" id="senha_atual" name="senha_atual" class="form-control mb-3" placeholder="Senha atual" required><br><br>
                    </div>
                    <div class="form-group">
                        <label for="nova_senha">Nova senha:</label>
                        <input style="border-radius: 5px;" type="password" id="nova_senha" name="nova_senha" class="form-control form-control-sm" placeholder="Nova senha" required autofocus="" autocomplete="off">
                    </div><br>
                    <button class="button" type="submit"><i class="fa-solid fa-check fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px;"></i>Salvar</button>
                </form>
                <br>
                <a href="perfil.php" class="button"><i class="fa-solid fa-arrow-left fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i> Voltar</a>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('profileImage').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</html>