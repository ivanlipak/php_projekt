<?php
	print '
	<h1>Registracija</h1>
	<div id="register">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		
		<form style = "text-align: center;" action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="fname">Ime:*</label><br>
			<input type="text" id="fname" name="firstname" placeholder="Upišite ime" required><br><br>
			<label for="lname">Prezime:*</label><br>
			<input type="text" id="lname" name="lastname" placeholder="Upišite prezime" required><br><br>
				
			<label for="email">E-mail:*</label><br>
			<input type="email" id="email" name="email" placeholder="Upišite e-mail" required><br><br>
			
			<label for="username">Username:*</label><br>
			<input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Min 5 i max 10 znakova" required><br><br>
			
									
			<label for="password">Password:*</label><br>
			<input type="password" id="password" name="password" placeholder="Min 4 znaka" pattern=".{4,}" required><br><br>
			<label for="country">Zemlja:</label><br>
			<select name="country" id="country">
				<option value="">Odaberite zemlju</option>';
				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
				}
			print '
			</select><br><br>
			<input type="submit" value="Submit">
		</form>';
		
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$query .= " OR username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['email'] == '' || $row['username'] == '') {
			
			$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
			$query  = "INSERT INTO users (firstname, lastname, email, username, password, country)";
			$query  .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "')";
			$result = @mysqli_query($MySQL, $query);
			echo '<p>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', thank you for registration </p>
			<hr>';
		}
		else {
			echo '<p>User with this email or username already exist!</p>';
		}
	}
	print '
	</div>';
?>
