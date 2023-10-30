<?php

	include ('header.php');

	$sql = "SELECT * FROM user WHERE role='USER'";
	$result = $connection->query($sql);
	$check = $result->num_rows;

	echo '
		<div class="body-main body-admin">
			<div class="wrap">
				<h1 class="content-title">Customer</h1>
				<hr>
				<br><br>
				<div class="single-content customer">
					<div class="title-customer">
						<h2>Customer List</h2>
					</div>
					<div class="table-content-customer">
	';

						if ($check > 0) {
							echo '
								<table border="1" class="customer-table">
									<tr>
										<th>User ID</th>
										<th>Name</th>
										<th>Email</th>
									</tr>
							';

							while ($cust = $result->fetch_array()) {
								echo '
									<tr>
										<td>'.$cust['userID'].'</td>
										<td>'.$cust['username'].'</td>
										<td>'.$cust['email'].'</td>
									</tr>
								';
							}

							echo '
								</table>
							';

						} else {

							echo '<h3 style="width:100%;">No customer found</h3>';

						}
	echo '
					</div>
				</div>
			</div>
		</div>
	';

	$connection->close();
?>