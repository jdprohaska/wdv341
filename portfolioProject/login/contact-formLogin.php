<?php
include 'main.php';
check_loggedin($pdo);
?>
<?php require_once("resources/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Corgi Club Pet Supplies</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
    <style>
     

     input {
       padding: 5px;
     }

     textarea {
       height: 200px;
       width: 400px;
     }
    </style>
  </head>
  <body>
    <div class="bg-image">
      <div class="wrapper">
      <?php include(TEMPLATE_FRONT . DS . "topNav.php") ?>

        <div class="corgiHeader">
          <img src="../images/peeking corgi transparent.png" alt="" />
        </div>

        <header class="header">
          <h1>Contact Us!</h1>
        </header>
        <?php include(TEMPLATE_FRONT . DS . "header.php") ?>
        <section class="columns">
          <div class="column content">
            <h3>We want to hear from you!</h3>
            <form method="POST" name="contactform" action="contact-form-handler.php"> 
              <p>
              <label for='name'>Your Name:</label> <br>
              <input type="text" name="name">
              </p>
              <p>
              <label for='email'>Email Address:</label> <br>
              <input type="text" name="email"> <br>
              </p>
              <p>
              <label for='message'>Whats on your mind?</label> <br>
              <textarea name="message"></textarea>
              </p>
              <input type="submit" value="Submit"><br>
              </form>
              
              
              
          </div>
        </section>
        <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
            </div>
          </div>
        
        
        
    
    <script language="JavaScript">
      // Code for validating the form
      
      var frmvalidator  = new Validator("contactform");
      frmvalidator.addValidation("name","req","Please provide your name"); 
      frmvalidator.addValidation("email","req","Please provide your email"); 
      frmvalidator.addValidation("email","email","Please enter a valid email address"); 
      </script>
  </body>
</html>
