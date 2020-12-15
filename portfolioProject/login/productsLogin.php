<?php
include 'main.php';
check_loggedin($pdo);
?>
<?php require_once("resources/config.php"); ?>
<?php require "../dbConnectLocal.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Corgi Club Pet Supplies</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
  
    <div class="bg-image">
      <div class="wrapper">
      <?php include(TEMPLATE_FRONT . DS . "topNav.php") ?>

        <div class="corgiHeader">
          <img src="../images/peeking corgi transparent.png" alt="" />
        </div>

        <header class="header">
          <h1>Products</h1>
        </header>
        <?php include(TEMPLATE_FRONT . DS . "header.php") ?>
        <section class="columns">
        <div class="column content">
            <h2>Presents For Pooches</h2>
          </div>
        </section>
        <section class="columns">
        <?php include(TEMPLATE_FRONT . DS . "productsDogs.php") ?>
        
</section>
         <section class="columns">
          <div class="column">
            <div class="divider"></div>
          </div>
          </section>
              <section class="columns">
                <div class="column content">
                  <h2>Treats for Cats</h2>
                </div>
              </section>
              <section class="columns">
              <?php include(TEMPLATE_FRONT . DS . "productsCats.php") ?>
              </section>
              <section class="columns">
                <div class="column">
                  <div class="divider"></div>
                </div>
              </section>
              <section class="columns">
                    <div class="column content">
                      <h2>Corgi Club Treat Box Subscription and Nutrition Information</h2>
                    </div>
                  </section>
                  <section class="columns">
                    <div class="column productContainer">
                      <h3>Corgi Club Box Subscription</h3>
                      <img src="../images/box.jpg" alt="">
                      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="AUFXBHKR5VA3L">
                        <table>
                        <tr><td><input type="hidden" name="on0" value="Pet">Pet</td></tr><tr><td><select name="os0">
                          <option value="Dog">Dog : $9.99 USD - monthly</option>
                          <option value="Cat">Cat : $9.99 USD - monthly</option>
                        </select> </td></tr>
                        </table>
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribe_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        
                        </form>
                        
                        <h4>$9.99/month</h4>
                        
                    </div>
                    <div class="column productContainer">
                      <h3>Digital Nutrition Pamphlet</h3>
                      <img src="../images/nutrition.jpg" alt="">
                      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="U24U3UQXLM6X8">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        
                        </form>
                        <h4>$1.00</h4>
                    </div>
                    <div class="column productContainer">
                      <h3>View Cart</h3>
                      <video src="../videos/wy6FmTX.gif" autoplay loop width="70%"></video>
                      <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_viewcart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        
                        </form>
                        
                    </div>
                  </section>
                  <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
                  
                  
            </div>
          </div>
        
        
        
   
  </body>
</html>
