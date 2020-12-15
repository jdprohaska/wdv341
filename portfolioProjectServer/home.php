<?php require_once("resources/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Corgi Club Pet Supplies</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="bg-image">
      <div class="wrapper">
        <?php include(TEMPLATE_FRONT . DS . "topNav.php") ?>

        <div class="corgiHeader">
          <img src="images/peeking corgi transparent.png" alt="" />
        </div>

        <header class="header">
          <h1>Corgi Club Pet Supplies</h1>
        </header>

        <section class="columns">
          <div class="column content">
            <h2><u>Welcome!</u></h2>
            <p>
              Thank you for stopping by Corgi Club Pet Supplies! Here we have a
              massive amount of treats and goodies That we know your pet is just
              going to love. Don't believe us? Check out our store page and see
              for yourself. Not sure what to get? Subscribe with our club choose
              a plan and get access to an assortment of goodies for your dog or
              cat and see for yourself just what kind of treats your pet enjoys
              the most.
            </p>
          </div>

          <div class="column">
            <div class="image">
              <img src="images/pembroke-5188516_1280.png" alt="" />
            </div>
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
