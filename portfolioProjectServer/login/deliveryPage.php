<?php require_once("resources/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Corgi Club Pet Supplies</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      
    </style>
  </head>
  <body>
    <div class="bg-image">
      <div class="wrapper">
      <?php include(TEMPLATE_FRONT . DS . "topNav.php") ?>

        <div class="corgiHeader">
          <img src="images/peeking corgi transparent.png" alt="" />
        </div>

        <header class="header">
          <h1>Thank You for your Purchase</h1>
        </header>
        <section class="columns">
          <div class="column content">
            <h2>Downloads</h2>
          </div>
        </section>
        <section class="columns">
          <div class="column productContainer">
            <a href="images/dog-5732745_1920.jpg" download=""><img src="images/dog-5732745_1920.jpg" alt=""></a>
            </div>
         

          <div class="column productContainer">
            <a href="documents/dogTreatNutritionInfo.pdf" download=""><img src="images/nutrition.jpg" alt=""></a>
            <h4>Download <a href="documents/dogTreatNutritionInfo.pdf" target="_blank" download="">Nutrition Info</a></h4>
          </div>

          <div class="column productContainer">
            <video src="videos/little_loki.mp4" controls width="90%"></video>
         
            <p>
            <a href="videos/little_loki.mp4">Little loki</a>
              </p>
            </div>
        </section>
        <section class="columns footer">
          <div class="column footerContent">
            <p><a href="jdprohaska.com">jdprohaska.com</a></p>
          </div>
          <div class="column footerContent">
            <p>&#169; Corgi Club Pet Supplies</p>
          </div>
          <div class="column footerContent">
            <div class="socialMedia">
            <p><a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-instagram"></a>
              <a href="#" class="fa fa-snapchat"></a>
              <a href="#" class="fa fa-reddit"></a>
            </p>
              </div>
          </div>
        </section>
        
            </div>
          </div>
        
        
        
   
  </body>
</html>
