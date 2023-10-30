<?php

	session_start();
	require ('../config.php');

    if (empty($_SESSION['user'])) {
		echo"<script>window.location='../account.php';</script>";
	}

    if (isset($_POST['logout'])) {

        if (!empty($_SESSION['user'])) {
            unset($_SESSION['user']);
            header("Location: ../account.php"); 
        }
    }


    $userID = $_SESSION['user'];
    $sql = "SELECT userName FROM user WHERE userID='$userID'";
    $result = $connection->query($sql);
    $user = $result->fetch_array(); 

	echo'
		<!DOCTYPE html>
		<html>
			<head>
				<title>Mr. Depot | Household Items & Hardware</title>
				<link rel="stylesheet" type="text/css" href="../css/style.css" />
				<link rel="shortcut icon" type="../image/icon" href="../images/favicon.png"/>
				<link rel="stylesheet" href="../css/all.css">
			</head>

			<body>
				<div class="header-main user">
					<div class="wrap">
						<div class="logo-main">
							<a href="../index.php"><img src="../images/logo.png" width="200px" height="175px"></a>
						</div>
						<div class="mini-user-site">
							<a href="index.php"><i class="fas fa-user"></i>&nbsp;'.$user['userName'].'</a>
							<form action="" method="POST">
								<button class="btn-logout" type="submit" name="logout">
									<i class="fas fa-sign-out-alt"></i>&nbsp;Logout
								</button>
							</form>
						</div>
						<br><br><br><br><br><br><br><br><br>
						<hr>
						<br>
						<ul class="main-menu">
							<li><a href="../index.php">Home</a></li>
						</ul>
					</div>
				</div>
	';
?>