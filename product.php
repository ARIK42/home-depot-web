<?php

	include ('header.php');

	echo '
		<div class="body-main">
			<div class="wrap">
				<br><br><br>
				<div class="single-content">
					<form action="" method="POST">
	';

						if (isset($_GET['product-detail'])) {							
							$id = $_GET['product-detail'];
							$sql = "SELECT * FROM item WHERE itemID='$id'";
							$result = $connection->query($sql);
							$item = $result->fetch_array();
							$category = $item["category"];

	echo '
							<div class="single-grid-left img-border">
								<img src="'.$item["image"].'" width="400px" height="400px">
								<input type="hidden" name="img" value="'.$item["image"].'">
							</div>
							<div class="single-grid-right">
								<h1 style="text-align: left; font-size: 30px; font-family: Lato,Arial,Helvetica Neue,Helvetica,sans-serif;">
								'.$item["name"].'
								</h1>
								<input type="hidden" name="name" value="'.$item["name"].'">
								<h1 style="text-align: left; font-size: 20px; font-family: Lato,Arial,Helvetica Neue,Helvetica,sans-serif;">
								RM '.$item["price"].'
								</h1>
								<input type="hidden" name="price" value="'.$item["price"].'">
								<br>
								<p style="font-family: Muli-Bold; font-size: 20px; line-height: 1.2;">
								'.$item["description"].'
								</p>
								<br><br>
	';

	echo'
							</div>
	';
						} else {
							header('location:404.php');
						}
?>