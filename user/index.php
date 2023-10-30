<?php
	include ('header.php');
	$sql = "SELECT * FROM user WHERE userID='$userID'";
	$result = $connection->query($sql);
	$data = $result->fetch_array();
	echo '
		<div class="body-main">
			<div class="wrap">
				<br><br><br>
				<div class="single-content user-account">
					<div class="user-form-account">
						<h4>UserID : '.$data['userID'].'</h4>
						<h4>Name : '.$data['username'].'</h4>
						<div class="show-form" id="accountName">
							<form action="" method="POST">
								<input type="text" name="name" value="'.$data['username'].'" required>
								<br><br>
								<button class="btn-submit" type="submit" name="fullname-save" value="'.$userID.'">Save</button>
								<button class="btn-submit" onclick="closeForm()">Cancel</button>
							</form>
						</div>
						<h4>Email : '.$data['email'].'</h4>
						<div class="show-form" id="accountContact">
							<form action="" method="POST">
								<br><br>
								<button class="btn-submit" type="submit" name="contact-save" value="'.$userID.'">Save</button>
								<button class="btn-submit" onclick="closeForm2()">Cancel</button>
							</form>
						</div>
					</div>
				</div>
				<br><br>
			</div>
		</div>
	';
?>


