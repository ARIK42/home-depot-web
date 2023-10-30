<?php

	session_start();
	require ('config.php');

   	if(isset($_POST["submit_search"])) {

      	if(!empty($_POST["search"])) {
      		$query = str_replace(" ", "+", $_POST["search"]);
        	header("location:search.php?search=" . $query);
        }
 	}

	echo'
		<!DOCTYPE html>
		<html>
			<head>
				<title>Mr. Depot | Household Items & Hardware</title>
				<link rel="stylesheet" type="text/css" href="css/style.css" />
				<link rel="shortcut icon" type="image/icon" href="images/favicon.png"/>
				<link rel="stylesheet" href="css/all.css">
			</head>

			<body> 
					<div class="header-main">
						<div class="wrap">
							<left>
								<img src="images/logo.png" style="width:200px;height:175px;" alt="logo" />
							</left>
							<div class="mini-user-site">
								<a href="account.php"><i class="fas fa-user"></i>&nbsp;Account</a>
								&nbsp;&nbsp;&nbsp;	
							</div>
							<hr>
							
							<ul class="main-menu">
								<li><a href="index.php">Home</a></li>
								
									<li>

										<form action="category.php" method="GET">
											<li><button class="category" type="submit" name="all" value="All Products">
												All Products
											</li></button>
											<li><button class="category" type="submit" name="category" value="Hardware">
												Hardware 
											</li></button>
											<li><button class="category" type="submit" name="category" value="Electrical Appliances">
												Electrical Appliances
											</li></button>
											<li><button class="category" type="submit" name="category" value="Household Items">
												Household Items
											</li></button>
										</form>
								<li><a href="about.php">About Us</a><li>
							</ul>

						</div>
					</div>

	';
?>