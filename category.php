<?php

	if (isset($_GET['category'])) {

		include ('header.php');
		$category = $_GET['category'];
		$sql = "SELECT * FROM item WHERE category='$category'";
		$result = $connection->query($sql);

		echo '
			<div class="body-main">
				<div class="wrap">
				<br>
					<h1 style="text-align: center; text-transform: uppercase; font-family: Lato,Arial,Helvetica Neue,Helvetica,sans-serif;">'.$category.'</h1>

					<br><br><br>
					<div class="catalog-content">
						<form action="product.php" method="GET">
		';
							while ($item = $result->fetch_array()) {
								
								echo '
									<div class="catalog-gridx4">
										<button type="submit" class="btn-item-detail" name="product-detail" value="'.$item["itemID"].'">
										<img class="img-border" src="'.$item["image"].'" width="250px" height="225px">
										<div class="item-info">
											<div class="item-name">'.$item["name"].'</div>
											<br>
											<div class="item-price">RM'.$item["price"].'</div>
										</div>
									</button>
									</div>
								';
							}
		echo '
						</form>
					</div>
				</div>
			</div>
		';

	} else if (isset($_GET['all'])) { 

		include ('header.php');
		$sql = "SELECT * FROM item";
		$result = $connection->query($sql);

		echo '
			<div class="body-main">
				<div class="wrap">
				<br>
					<h1 style="text-align: center; text-transform: uppercase; font-family: Lato,Arial,Helvetica Neue,Helvetica,sans-serif;">'.$_GET['all'].'</h1>
	
					<br><br><br>
					<div class="catalog-content">
						<form action="product.php" method="GET">
		';

							while ($item = $result->fetch_array()) {
								
								echo '
									<div class="catalog-gridx4">
										<button type="submit" class="btn-item-detail" name="product-detail" value="'.$item["itemID"].'">
										<img class="img-border" src="'.$item["image"].'" width="250px" height="225px">
										<div class="item-info">
											<div class="item-name">'.$item["name"].'</div>
											<br>
											<div class="item-price">RM'.$item["price"].'</div>
										</div>
									</button>
									</div>
								';
							}
		echo '
						</form>
					</div>
				</div>
			</div>
		';

	} else {

		header('location:404.php');
	}
?>