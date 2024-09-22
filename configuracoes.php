<?php
include 'connect_db.php';
?>

<!doctype html>
<html>
<title>Perfil</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
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
</head>

<body style="background-color: #DDA0DD;">

    <div class="col-sm-6">
        <div class="card">
            <img src="<?= $_SESSION['avatar'] ?>" id="profilePreview" style="border-radius: 50%; min-height:150px; max-height:150px; max-width:150px; min-width: 150px; margin-top:-15%; background-color: white; padding: 6px;">
            <br>
            
                <div class="container">
                    <div class="row" style="padding-bottom: 1px;">
                        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                            <label class="button" for="profileImage"><i class="fa-solid fa-id-badge fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>Trocar foto de perfil?</label><br>
                            <input type="file" id="profileImage" name="profileImage" hidden accept="image/*"><br>
                            <button class="button" type="submit"><i class="fa-solid fa-check fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>Salvar</button>
                        </form>

                        
                    </div>
                
                <a href="perfil.php" class="button"><i class="fa-solid fa-arrow-left fa-xl mr-4 col-sm-6"  style="color: #525252; float:left; padding:10px 0 10px 8px"></i> Voltar</a>
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
                // document.getElementById('profilePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</html>