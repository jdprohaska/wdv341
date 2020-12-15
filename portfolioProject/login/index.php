<?php
include 'main.php';
// If the user is logged-in redirect them to the home page
if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
    exit;
}
// Also check if the user is remembered, if so redirect them to the home page
if (isset($_COOKIE['rememberme']) && !empty($_COOKIE['rememberme'])) {
	// If the remember me cookie matches one in the database then we can update the session variables and the user will be logged-in.
	$stmt = $pdo->prepare('SELECT * FROM accounts WHERE rememberme = ?');
	$stmt->execute([ $_COOKIE['rememberme'] ]);
	$account = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($account) {
		// Found a match, user is "remembered" log them in automatically
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $account['username'];
		$_SESSION['id'] = $account['id'];
        $_SESSION['role'] = $account['role'];
        header('Location: home.php');
		exit;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
		
		</style>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Login</title>
		
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
	<nav>
          <input type="checkbox" id="nav-toggle" />
          <div class="logo"><strong>Corgi Club Pet Supplies</strong></div>
          <ul class="links">
            <li><a href="../home.php">Home</a></li>
            <li><a href="../about.php">About</a></li>
            <li><a href="../products.php">Products</a></li>
            <li><a href="../contact-form.php">Contact</a></li>
            <li><a href="index.php">Login</a></li>
        
          </ul>
          <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </label>
		</nav>
		<div class="wrapper">
		<div class="login">
			<h1>Login</h1>
			<div class="links">
				<a href="index.php" class="active">Login</a>
				<a href="register.html">Register</a>
			</div>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label id="rememberme">
					<input type="checkbox" name="rememberme">Remember me
				</label>
				<div class="msg"></div>
				<input type="submit" value="Login">
			</form>
		</div>
		<script>
        document.querySelector(".login form").onsubmit = function(event) {
			event.preventDefault();
			var form_data = new FormData(document.querySelector(".login form"));
			var xhr = new XMLHttpRequest();
			xhr.open("POST", document.querySelector(".login form").action, true);
			xhr.onload = function () {
				if (this.responseText.toLowerCase().indexOf("success") !== -1) {
					window.location.href = "home.php";
				} else {
					document.querySelector(".msg").innerHTML = this.responseText;
				}
			};
			xhr.send(form_data);
		};
		</script>
		<section class="columns footer">
          <div class="column footerContent">
            <p><a href="http://jdprohaska.com/" target="_blank">jdprohaska.com</a></p>
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
	</body>
</html>
