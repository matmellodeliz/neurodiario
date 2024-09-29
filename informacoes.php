<?php
?>
<!doctype html>
<html>
<title>Informações</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  @keyframes tonext {
    75% {
      left: 0;
    }

    95% {
      left: 100%;
    }

    98% {
      left: 100%;
    }

    99% {
      left: 0;
    }
  }

  @keyframes tostart {
    75% {
      left: 0;
    }

    95% {
      left: -300%;
    }

    98% {
      left: -300%;
    }

    99% {
      left: 0;
    }
  }

  @keyframes snap {
    96% {
      scroll-snap-align: center;
    }

    97% {
      scroll-snap-align: none;
    }

    99% {
      scroll-snap-align: none;
    }

    100% {
      scroll-snap-align: center;
    }
  }

  body {
    max-width: 60vw;
    max-height: 800px;
    margin: 0 auto;
    padding: 5% 1.25rem;
    font-family: 'Lato', sans-serif;
  }

  * {
    box-sizing: border-box;
    scrollbar-color: transparent transparent;
    /* thumb and track color */
    scrollbar-width: 0px;
  }

  *::-webkit-scrollbar {
    width: 0;
  }

  *::-webkit-scrollbar-track {
    background: transparent;
  }

  *::-webkit-scrollbar-thumb {
    background: transparent;
    border: none;
  }

  * {
    -ms-overflow-style: none;
  }

  ol,
  li {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .carousel {
    position: relative;
    padding-top: 75%;
    filter: drop-shadow(0 0 10px #0003);
    perspective: 100px;
  }
  .carousel__viewport {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    overflow-x: scroll;
    counter-reset: item;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
  }

  .carousel__slide {
    position: relative;
    flex: 0 0 100%;
    width: 100%;
    counter-increment: item;
  }
  .carousel__slide:before {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate3d(-50%, -40%, 70px);
    color: #fff;
    font-size: 2em;
  }
  .carousel__snapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    scroll-snap-align: center;
  }
  @media (hover: hover) {
    .carousel__snapper {
      animation-name: tonext, snap;
      animation-timing-function: ease;
      animation-iteration-count: infinite;
    }

    .carousel__slide:last-child .carousel__snapper {
      animation-name: tostart, snap;
    }
  }
  @media (prefers-reduced-motion: reduce) {
    .carousel__snapper {
      animation-name: none;
    }
  }
  .carousel:hover .carousel__snapper,
  .carousel:focus-within .carousel__snapper {
    animation-name: none;
  }
  .carousel__navigation {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    text-align: center;
  }
  .carousel__navigation-list,
  .carousel__navigation-item {
    display: inline-block;
  }
  .carousel__navigation-button {
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background-color: #333;
    background-clip: content-box;
    border: 0.25rem solid transparent;
    border-radius: 50%;
    transition: transform 0.1s;
    font-size: 19px;
  }
  .carousel::before,
  .carousel::after,
  .carousel__prev,
  .carousel__next {
    position: absolute;
    top: 0;
    margin-top: 37.5%;
    width: 4rem;
    height: 4rem;
    transform: translateY(-50%);
    font-size: 0;
    outline: 0;
  }
  .carousel::before,
  .carousel__prev {
    left: -1rem;
  }
  .carousel::after,
  .carousel__next {
    right: -1rem;
  }
  .carousel::before,
  .carousel::after {
    z-index: 1;
    background-color: #333;
    background-size: 1.5rem 1.5rem;
    background-repeat: no-repeat;
    background-position: center center;
    color: #fff;
    font-size: 2.5rem;
    line-height: 4rem;
    text-align: center;
    pointer-events: none;
  }
  .carousel::before {
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='0,50 80,100 80,0' fill='%23fff'/%3E%3C/svg%3E");
  }
  .carousel::after {
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='100,50 20,100 20,0' fill='%23fff'/%3E%3C/svg%3E");
  }
  a {
    text-decoration: none !important;
  }
  @media only screen and (max-width: 600px) {
    body {
      max-width: 90%;
      height: 100vh;
    }
    .carousel__navigation{
      display: none;
    }
    .carousel{
      padding-top: 90vh;
    }
  }
</style>
</head>
<body style="background-color: #DDA0DD;">
  <div style="padding-bottom: 5px;">
    <a href="perfil.php" class="btn btn-secondary d-inline float-right" style="width: 75px;cursor: pointer;box-shadow: 0px 0px 2px gray;border: none;outline: none;padding: 5px;border-radius: 5px;background-color: white"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
  </div>
  <section class="carousel" aria-label="Gallery">
    <ol class="carousel__viewport">
      <li id="carousel__slide1" tabindex="0" class="carousel__slide">
        <table style="text-align: left; padding: 10%">
          <thead>
            <th style="text-align: center;"><img src="img/brain.png" style="height: 150px; width:150px" alt=""></th>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 10% 10% 0 10%;"><b>O que é epilepsia?</b></td>
            </tr>
            <tr>
              <td style="padding: 2% 10% 0 10%;overflow:scroll"> Uma condição crônica do cérebro que causa convulsões recorrentes.
                As convulsões são súbitas explosões de atividade elétrica anormal no cérebro que podem causar alterações na consciência, comportamento ou movimento.
                Embora a epilepsia possa ser desafiadora, é importante lembrar que ela não define quem você é. Com tratamento adequado,
                a maioria das pessoas com epilepsia pode viver uma vida plena e saudável.</td>
            </tr>
          </tbody>

        </table>
        <div class="carousel__snapper">

        </div>
      </li>
      <li id="carousel__slide2" tabindex="0" class="carousel__slide">
        <table style="text-align: left; padding: 3%">
          <thead>
            <th style="text-align: center;"><img src="img/tipos-crise.png" style="height: 300px; width:70%;" alt=""></th>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 0% 10% 0 10%;"><b>Tipos de crises epilépticas</b></td>
            </tr>
            <tr>
              <td style="padding: 2% 10% 0 10%;overflow:scroll"> As crises epilépticas podem ser classificadas em dois grupos principais:
                crises focais e crises generalizadas.<br>
                <b>Crises focais</b> começam em uma área específica do cérebro e podem ou não causar perda de consciência.
                Os sintomas variam de acordo com a área do cérebro afetada, mas podem incluir contrações musculares em um lado do corpo,
                sensações estranhas (formigamento, visão turva, etc.) e alterações do humor ou da percepção.
                <br>
                <b>Crises generalizadas</b>, por outro lado, começam em ambos os lados do cérebro ao mesmo tempo e sempre causam perda de consciência.
                Existem diferentes tipos de crises generalizadas, cada um com seus próprios sintomas.
              </td>
            </tr>
          </tbody>

        </table>
        <div class="carousel__snapper"></div>

      </li>
      <li id="carousel__slide3" tabindex="0" class="carousel__slide">
        <table style="text-align: left; padding: 3%">
          <thead>
            <th style="text-align: center;"><img src="img/causas.png" style="height: 290px; width:290px;" alt=""></th>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 0% 10% 0 10%;"><b>Causas da Epilepsia: Conhecidas e Desconhecidas</b></td>
            </tr>
            <tr>
              <td style="padding: 2% 10% 0 10%;overflow:scroll">
                A epilepsia pode ter diversas origens, desde fatores genéticos até lesões cerebrais.
                Em cerca de 40% dos casos, a causa é genética, o que significa que a doença pode ser passada de pais para filhos.

                Outros fatores que podem levar à epilepsia incluem lesões cerebrais causadas por traumas, AVC ou infecções,
                desenvolvimento cerebral anormal antes ou durante o nascimento, e doenças neurológicas como Alzheimer, Parkinson e demência.

                É importante ressaltar que, em muitos casos, a causa da epilepsia permanece desconhecida.
                Essa condição é chamada de epilepsia idiopática. Apesar dos avanços na medicina, os mecanismos subjacentes
                à epilepsia idiopática ainda não foram totalmente elucidados.
              </td>
            </tr>
          </tbody>

        </table>
        <div class="carousel__snapper"></div>

      </li>
      <li id="carousel__slide4" tabindex="0" class="carousel__slide">
        <table style="text-align: left; padding: 3%">
          <thead>
            <th style="text-align: center;"><img src="img/misterios.png" style="height: 280px; width:150px;" alt=""></th>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 0% 10% 0 10%;"><b>Desvendando os Mistérios da Epilepsia: Diagnóstico em Etapas</b></td>
            </tr>
            <tr>
              <td style="padding: 2% 10% 0 10%;overflow:scroll">
                Tudo começa com uma <b>conversa franca com o médico</b>, que busca entender seus sintomas, histórico de crises,
                histórico familiar e outros fatores relevantes. Um exame físico completo também é realizado para verificar
                se há sinais que possam indicar a causa das crises.<br>
                O <b>eletroencefalograma (EEG)</b> é um exame crucial que registra a atividade elétrica do seu cérebro.
                Através de eletrodos no couro cabeludo, o EEG capta padrões de ondas cerebrais, revelando se há atividade anormal que possa estar relacionada à epilepsia.<br>
                Em alguns casos, outros exames podem ser necessários para complementar o diagnóstico. <b>Exames de sangue</b> podem verificar distúrbios metabólicos que podem levar
                a convulsões, enquanto testes neuropsicológicos avaliam suas funções cognitivas.<br>
                Em alguns casos, exames de imagem como <b>tomografia computadorizada (TC) e ressonância magnética (RM)</b> podem ser necessários.
                Essas ferramentas fornecem imagens detalhadas do seu cérebro, permitindo a identificação de possíveis causas das crises, como tumores, lesões ou malformações vasculares.
              </td>
            </tr>
          </tbody>

        </table>
        <div class="carousel__snapper"></div>

      </li>
    </ol>
    <aside class="carousel__navigation">
      <ol class="carousel__navigation-list">
        <li class="carousel__navigation-item">
          <a href="#carousel__slide1" class="carousel__navigation-button" style="text-decoration: none; color:white;">1</a>
        </li>
        <li class="carousel__navigation-item">
          <a href="#carousel__slide2" class="carousel__navigation-button" style="text-decoration: none; color:white">2</a>
        </li>
        <li class="carousel__navigation-item">
          <a href="#carousel__slide3" class="carousel__navigation-button" style="text-decoration: none; color:white">3</a>
        </li>
        <li class="carousel__navigation-item">
          <a href="#carousel__slide4" class="carousel__navigation-button" style="text-decoration: none; color:white">4</a>
        </li>
      </ol>
    </aside>
  </section>

</body>

</html>