<?php

	include ('header.php');
	$sql = "SELECT * FROM user WHERE role='ADMIN'";
	$result = $connection->query($sql);
	$check = $result->num_rows;

	if (isset($_POST['open-new-form'])) {

		echo'
			<div class="overlay overlay-edit">
				<div class="popup item">
					<a class="close" href="setting.php">&times;</a>
					<div class="content">
						<h2>Add New User</h2>
						<form action="setting.php" method="POST">
							<h4>Fullname :</h4>
							<input type="text" name="name" reuqired>
							<h4>Email :</h4>
							<input type="email" name="email" reuqired>
							<h4>Password :</h4>
							<input type="password" name="pass" required>
							<br><br>
							<button type="submit" class="btn-submit save-item-page" name="add-new-user">
								Save
							</button>
							<button type="clear" class="btn-submit save-item-page">
								Clear
							</button>
						</form>
					</div>
				</div>
			</div>
		';
	}

	if (isset($_POST['add-new-user'])) {
		$name = $connection->real_escape_string($_POST['name']);
		$email = $connection->real_escape_string($_POST['email']);
        $pass = $connection->real_escape_string($_POST['password']);
        $pass = md5($password);
		$sql2 = "INSERT INTO user(username, email, password, role)
		VALUES ('$name', '$email', '$pass', 'ADMIN')";

		if ($connection->query($sql2) === TRUE) {
			echo'
				<div class="overlay overlay-edit">
					<div class="popup item2">
						<a class="close" href="setting.php">&times;</a>
						<div class="content">
							<h2>Success</h2>
							<p>New User Added.</p>
						</div>
					</div>
				</div>
			';
		}
	}

	if (isset($_POST['delete-user'])) {
		$userID = $_POST['delete-user'];
		$sql6 = "DELETE FROM user WHERE userID='$userID'";

		if ($connection->query($sql6) === TRUE) {		
			echo'
				<div class="overlay overlay-edit">
					<div class="popup">
						<a class="close" href="setting.php">&times;</a>
						<div class="content">
							<h2>Success</h2>
							<p>User deleted.</p>
						</div>
					</div>
				</div>
			';
		}
	}

	echo '
		<div class="body-main body-admin">
			<div class="wrap">
				<h1 class="content-title">User - Admin</h1>
				<hr>
				<br><br>
				<div class="single-content item">
					<form action="" method="POST" class="addnewitem-section">
						<button type="submit" class="btn-submit save-item-page" name="open-new-form">
							Add New User
						</button>
					</form>
				</div>
				<div class="single-content item">
					<form action="" method="POST">
						<br>
	';
					if ($check > 0) {
						echo '
								<table border="1" class="item-table">
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Role</th>
										<th class="item-action">Action</th>
									</tr>
						';

						while ($user = $result->fetch_array()) {
							echo '
								<tr>
									<td>'.$user['userID'].'</td>
									<td>'.$user['username'].'</td>
									<td>'.$user['email'].'</td>
									<td>'.$user['role'].'</td>
									<td>
										<div class="setting-action-wrap">
										<button type="submit" class="btn-submit item-page" name="delete-user" value="'.$user['userID'].'">
											<i class="fas fa-trash-alt"></i>
										</button>
										</div>
									</td>
								</tr>
							';
						}

						echo '
								</table>
						';

					} else {

						echo '<h3 style="width:100%;">No user found</h3>';

					}
	echo '
					</form>
				</div>
				<br><br>
			</div>
		</div>
	';

	$connection->close();
?>