<?php

	include ('header.php');

	$sql = "SELECT * FROM item";
	$result = $connection->query($sql);
	$count = $result->num_rows;
	$sql3 = "SELECT * FROM user WHERE role='USER'";
	$result3 = $connection->query($sql3);
	$count3 = $result3->num_rows;

	echo '
		<div class="body-main body-admin">
			<div class="wrap">
				<h1 class="content-title">Dashboard</h1>
				<hr>
				<br><br><br>
				<div class="single-content dashboard">
					<div class="extra-wrap">
						<div class="grid-right">
							<i></i>
							<h3>'.$count3.'</h3>
							<br>
							<i></i>
							<h3>'.$count4.'</h3>
						</div>
					</div>
				</div>
				<br><br>
			</div>
		</div>
	';

	$connection->close();
?>

