<?php
include 'connect_db.php';
$nome = explode(" ", $_SESSION['nome']);
$nome = $nome[0];
?>
<!doctype html>
<html>
<title>Informações</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>

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
    
  max-width: 50%;
  max-height: 20%;  
  margin: 0 auto;
  padding: 5% 1.25rem;
  font-family: 'Lato', sans-serif;
}

* {
  box-sizing: border-box;
  scrollbar-color: transparent transparent; /* thumb and track color */
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

ol, li {
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
  transform: translate3d(-50%,-40%,70px);
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
    animation-duration: 4s;
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
  border-radius: 50%;
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
  content: '<';
}

.carousel::after {
    content: '>';
}

</style>
</head>

<body style="background-color: #DDA0DD;">
<section class="carousel" aria-label="Gallery">
  <ol class="carousel__viewport">
    <li id="carousel__slide1"
        tabindex="0"
        class="carousel__slide">
        <table style="text-align: left; padding: 10%">
                    <thead>
                        <th style="text-align: center;"><img src="img/brain.png" style="height: 150px; width:150px" alt=""></th>
                    </thead>
                    <tbody>
                        <tr><td style="padding: 10% 10% 0 10%;"><b>O que é epilepsia?</b></td></tr>
                        <tr>
                            <td style="padding: 2% 10% 0 10%;overflow:scroll"> Uma condição crônica do cérebro que causa convulsões recorrentes.
                                As convulsões são súbitas explosões de atividade elétrica anormal no cérebro que podem causar alterações na consciência, comportamento ou movimento.
                                Embora a epilepsia possa ser desafiadora, é importante lembrar que ela não define quem você é. Com tratamento adequado,
                                a maioria das pessoas com epilepsia pode viver uma vida plena e saudável.</td>
                        </tr>
                    </tbody>

                </table>
      <div class="carousel__snapper">
        <a href="#carousel__slide4"
           class="carousel__prev">4</a>
        <a href="#carousel__slide2"
           class="carousel__next" ></a>
      </div>
    </li>
    <li id="carousel__slide2"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide1"
         class="carousel__prev"><span style="text-decoration: none;"></span></a>
      <a href="#carousel__slide3"
         class="carousel__next"><span style="text-decoration: none;"></span></a>
    </li>
    <li id="carousel__slide3"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide2"
         class="carousel__prev"><span style="text-decoration: none;"></span></a>
      <a href="#carousel__slide4"
         class="carousel__next"><span style="text-decoration: none;"></span></a>
    </li>
    <li id="carousel__slide4"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide3"
         class="carousel__prev"><span style="text-decoration: none;"></span></a>
      <a href="#carousel__slide1"
         class="carousel__next"><span style="text-decoration: none;"></span></a>
    </li>
  </ol>
  <aside class="carousel__navigation">
    <ol class="carousel__navigation-list">
      <li class="carousel__navigation-item">
        <a href="#carousel__slide1"
           class="carousel__navigation-button" style="text-decoration: none; color:white;"></a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide2"
           class="carousel__navigation-button" style="text-decoration: none; color:white"></a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide3"
           class="carousel__navigation-button" style="text-decoration: none; color:white"></a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide4"
           class="carousel__navigation-button" style="text-decoration: none; color:white"></a>
      </li>
    </ol>
  </aside>
</section>
    
</body>

</html>