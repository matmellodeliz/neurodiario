<?php
session_start();
?>

<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Calendário de eventos</title>

  <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#DDA0DD">

  <div id="container">
    <div style="padding-bottom: 5px;">
      <a href="../perfil.php" class="btn btn-secondary d-inline float-right" style="width: 75px;cursor: pointer;box-shadow: 0px 0px 2px gray;border: none;outline: none;padding: 5px;border-radius: 5px;text-decoration:none;background-color: white"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
    </div>
    <div id="header">
      <div id="monthDisplay" style="color: black;"></div>
      <div>
        <button id="backButton">Anterior</button>
        <button id="nextButton">Próximo</button>
      </div>
    </div>

    <div id="weekdays" style="background-color:white;border-bottom: 1px solid black">
      <div>Dom</div>
      <div>Seg</div>
      <div>Ter</div>
      <div>Qua</div>
      <div>Qui</div>
      <div>Sex</div>
      <div>Sáb</div>
    </div>

    <div id="calendar"></div>
  </div>

  <div id="newEventModal">
    <h2>Novo evento</h2>

    <input id="eventTitleInput" placeholder="Evento" />

    <button id="saveButton">Salvar</button>
    <button id="cancelButton">Cancelar</button>
  </div>

  <div id="deleteEventModal">
    <h2>Evento</h2>

    <p id="eventText"></p>

    <button id="deleteButton">Excluir</button>
    <button id="closeButton">Fechar</button>
  </div>

  <div id="modalBackDrop"></div>

  <script src="./script.js"></script>
</body>

</html>