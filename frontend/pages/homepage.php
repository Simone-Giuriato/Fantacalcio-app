<?php

session_start();
if (empty($_SESSION['user_id'])) {
    header('location: ../login.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fantacalcio | Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo1.png">
</head>

<body style="background-color: #ffebcd">

<?php require_once(__DIR__ . '\navbar.php'); ?>


<div id="carouselExampleCaptions" class="carousel slide">
<h2>Ultime news:</h2>
<hr>
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="https://www.ilbianconero.com/a/juve-la-champions-e-ancora-possibile-il-pensiero-di-rabiot-32771" target="_blank">
      <img src="../assets/img/allegri.jpg" class="d-block w-100" alt="...">
</a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Max Allegri</h5>
        <p>Rimonta Champions League?</p>
      </div>
    </div>
    <div class="carousel-item">
    <a href="https://sport.sky.it/calcio/serie-a/2023/02/26/napoli-juve-102-punti-confronto" target="_blank">
      <img src="../assets/img/spalletti.jpg" class="d-block w-100" alt="...">
</a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Luciano spalletti</h5>
        <p>Un Napoli da Record Azzuro</p>
      </div>
    </div>
    <div class="carousel-item">
    <a href="https://www.figc.it/" target="_blank">
      <img src="../assets/img/figc.jpg" class="d-block w-100" alt="...">
</a>
      <div class="carousel-caption d-none d-md-block">
        
        <p>Entra a far parte della Figc</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


</body>
</html>

<style>

  #carouselExampleCaptions{
    margin: auto;
    margin-top: 100px;
    width: 50%;
  }

</style>