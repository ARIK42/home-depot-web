<?php

	session_start();
	require ('../config.php');

    if (empty($_SESSION['user'])) {
		echo"<script>window.location='../account.php';</script>";
	}

	if ($_SESSION['role'] != 'ADMIN') {
		header('location:../404.php');
	}

    if (isset($_POST['logout'])) {

        if (!empty($_SESSION['user'])) {
            unset($_SESSION['user']);
            header("Location: ../account.php"); 
        }
    }

    $userID = $_SESSION['user'];
    $sql = "SELECT username FROM user WHERE userID='$userID'";
    $result = $connection->query($sql);
    $user = $result->fetch_array();

	echo'
		<!DOCTYPE html>
		<html>
			<head>
				<title>Mr. Depot | Household Items & Hardware</title>
				<link rel="stylesheet" type="text/css" href="../css/style.css" />
				<link rel="shortcut icon" type="../images/icon" href="../images/favicon.png"/>
				<link rel="stylesheet" href="../css/all.css">
			</head>

			<body>
				<div class="header-main admin">
					<div class="wrap">
						<div class="title-admin-panel">
							<h2>Admin Panel</h2>
						</div>
						<div class="logo-main">
							<a href="../index.php"><img src="../images/logo.png" width="100px" height="100px"></a>
						</div>
						<div class="mini-user-site">
							<a href="index.php"><i class="fas fa-user"></i>&nbsp;'.$user['username'].'</a>
							<form action="" method="POST">
								<button class="btn-logout" type="submit" name="logout">
									<i class="fas fa-sign-out-alt"></i>&nbsp;Logout
								</button>
							</form>
						</div>
						<hr>
						<br>
						<ul class="main-menu">
							<li><a href="index.php">Dashboard</a></li>
							<li><a href="customer.php">Customer</a></li>
							<li><a href="setting.php">Setting</a></li>
						</ul>
					</div>
				</div>
	';
?>