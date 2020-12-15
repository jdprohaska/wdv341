
<?php
include 'main.php';
check_loggedin($pdo);
// output message (errors, etc)
$msg = '';
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $pdo->prepare('SELECT * FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->execute([ $_SESSION['id'] ]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);
// Handle edit profile post data
if (isset($_POST['username'], $_POST['password'], $_POST['cpassword'], $_POST['email'])) {
	// Make sure the submitted registration values are not empty.
	if (empty($_POST['username']) || empty($_POST['email'])) {
		$msg = 'The input fields must not be empty!';
	} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$msg = 'Please provide a valid email address!';
	} else if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
	    $msg = 'Username must contain only letters and numbers!';
	} else if (!empty($_POST['password']) && (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5)) {
		$msg = 'Password must be between 5 and 20 characters long!';
	} else if ($_POST['cpassword'] != $_POST['password']) {
		$msg = 'Passwords do not match!';
	}
	if (empty($msg)) {
		// Check if new username or email already exists in database
		$stmt = $pdo->prepare('SELECT COUNT(*) FROM accounts WHERE (username = ? OR email = ?) AND username != ? AND email != ?');
		$stmt->execute([ $_POST['username'], $_POST['email'], $_SESSION['name'], $account['email'] ]);
		if ($result = $stmt->fetchColumn()) {
			$msg = 'Account already exists with that username and/or email!';
		} else {
			// no errors occured, update the account...
			$uniqid = account_activation && $account['email'] != $_POST['email'] ? uniqid() : $account['activation_code'];
			$stmt = $pdo->prepare('UPDATE accounts SET username = ?, password = ?, email = ?, activation_code = ? WHERE id = ?');
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $account['password'];
			$stmt->execute([ $_POST['username'], $password, $_POST['email'], $uniqid, $_SESSION['id'] ]);
			// Update the session variables
			$_SESSION['name'] = $_POST['username'];
			if (account_activation && $account['email'] != $_POST['email']) {
				// Account activation required, send the user the activation email with the "send_activation_email" function from the "main.php" file
				send_activation_email($_POST['email'], $uniqid);
				// Log the user out
				unset($_SESSION['loggedin']);
				$msg = 'You have changed your email address, you need to re-activate your account!';
			} else {
				// profile updated redirect the user back to the profile page and not the edit profile page
				header('Location: profile.php');
				exit;
			}
		}
	}
}
?>
<?php require_once("resources/config.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Profile Page</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body class="loggedin">
	<?php include(TEMPLATE_FRONT . DS . "topNav.php") ?>
		<?php if (!isset($_GET['action'])): ?>
			<div class="bg-image">
			<div class="wrapper">
	
				<section class="columns">
					<div class="column">
		<div class="container profile">
			<h2>Profile Page</h2>
			<div class="block">
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username: </td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><?=$account['email']?></td>
					</tr>
					<tr>
						<td>Role: </td>
						<td><?=$account['role']?></td>
					</tr>
				</table>
		
				<a class="profile-btn" href="profile.php?action=edit">Edit Details</a>

				</div>
		</section>
		<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
		</div>
		</div>
			</div>
		</div>
		<?php elseif ($_GET['action'] == 'edit'): ?>
			<div class="bg-image">
			<div class="wrapper">
				<section class="columns">
					<div class="column">
		<div class="container profile">
			<h2>Edit Profile Page</h2>
			<div class="block">
				<form action="profile.php?action=edit" method="post">
					<label for="username">Username</label>
					<input type="text" value="<?=$_SESSION['name']?>" name="username" id="username" placeholder="Username">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="Password">
					<label for="cpassword">Confirm Password</label>
					<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
					<label for="email">Email</label>
					<input type="email" value="<?=$account['email']?>" name="email" id="email" placeholder="Email">
					<br>
					<input class="profile-btn" type="submit" value="Save">
					<p><?=$msg?></p>
				</form>
				
			</div>
			
		</div>
		
		<?php endif; ?>
		</div>
		</section>
		<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
		</div>
		</div>
	</body>
</html>
