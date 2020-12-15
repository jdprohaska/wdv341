<nav>
			<input type="checkbox" id="nav-toggle" />
			<div class="logo">
				<div><strong>Corgi Club Pet Supplies</strong></div>
				
			</div>
			<ul class="links">
			  <li><a href="home.php">Home</a></li>
			  <li><a href="aboutLogin.php">About</a></li>
			  <li><a href="productsLogin.php">Products</a></li>
			  <li><a href="contact-formLogin.php">Contact</a></li>
			  <a href="profile.php">Profile</a>
			  <?php if ($_SESSION['role'] == 'Admin'): ?>
				<a href="admin/index.php" target="_blank">Admin</a>
				<?php endif; ?>
				<a href="logout.php">Logout</a>
		  
			</ul>
			<label for="nav-toggle" class="icon-burger">
			  <div class="line"></div>
			  <div class="line"></div>
			  <div class="line"></div>
			</label>
		  </nav>