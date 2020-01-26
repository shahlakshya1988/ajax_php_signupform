<?php 
require_once __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."connection".DIRECTORY_SEPARATOR."db.php"; 
require_once __DIR__.DIRECTORY_SEPARATOR."function".DIRECTORY_SEPARATOR."func.php";
if(!isset($_SESSION["id"]) || empty($_SESSION["id"]) ){
	$_SESSION["unauthorized"] = true;
	header("Location: ../index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile Page</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../assets/css/styles.css" />    
	<link rel="stylesheet" href="../assets/css/profile.css" />    
	<script type="text/javascript" src="../assets/js/jquery.min.js" ></script>
</head>
<body>
	<?php require_once __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."navigation.php"; ?>
	<?php
	if(isset($_SESSION["image_success"])){ ?>
		<div class="alert alert-success text-center all-msg success-msg">
			<?=$_SESSION["image_success"]; ?>
		</div>
	<?php unset($_SESSION["image_success"]); }	?>
	<?php
	if(isset($_SESSION["bio_success"])){ ?>
		<div class="alert alert-success text-center all-msg success-msg">
			<?=$_SESSION["bio_success"]; ?>
		</div>
	<?php unset($_SESSION["bio_success"]); }	?>

	<?php
	if(isset($_SESSION["facebook_success"])){ ?>
		<div class="alert alert-success text-center all-msg success-msg">
			<?=$_SESSION["facebook_success"]; ?>
		</div>
	<?php unset($_SESSION["facebook_success"]); }	?>

	<?php
	if(isset($_SESSION["linkedin_success"])){ ?>
		<div class="alert alert-success text-center all-msg success-msg">
			<?=$_SESSION["linkedin_success"]; ?>
		</div>
	<?php unset($_SESSION["linkedin_success"]); }	?>

	<?php
	if(isset($_SESSION["password_success"])){ ?>
		<div class="alert alert-success text-center all-msg success-msg">
			<?=$_SESSION["password_success"]; ?>
		</div>
	<?php unset($_SESSION["password_success"]); }	?>
	<?php
	if(isset($_SESSION["name_success"])){ ?>
		<div class="alert alert-success text-center all-msg success-msg">
			<?=$_SESSION["name_success"]; ?>
		</div>
	<?php unset($_SESSION["name_success"]); }	?>

	<?php
	if(isset($_SESSION["address_success"])){ ?>
		<div class="alert alert-success text-center all-msg success-msg">
			<?=$_SESSION["address_success"]; ?>
		</div>
	<?php unset($_SESSION["address_success"]); }	?>
	

	<div class="container contents">
		<div class="row">
			<div class="col-md-3">
				<div class="left-area">
					<?php links(); ?>
				</div>
				<!-- div.left-area -->
			</div>
			<!-- div.col-md-3 -->
			<div class="col-md-9">
				<div class="right-area">
					 <div class="row">
					 	<div class="col-md-4">
							 <h3>Profile Information</h3>
						 </div>
						 <div class="col-md-8">
							<?=percentage();?>% Complete
						 </div>
					 </div> <!--  div.row -->
					 <hr>
					 <?php user_info(); ?>

					<!-- bio.modal.php -->
					<?php include "parts".DIRECTORY_SEPARATOR."bio.modal.php"; ?>
					<!-- bio.modal.php -->
					<!-- facebook.modal.php -->
					<?php include "parts".DIRECTORY_SEPARATOR."facebook.modal.php"; ?>
					<!-- facebook.modal.php -->
					<!-- linkedin.modal.php -->
					<?php include "parts".DIRECTORY_SEPARATOR."linkedin.modal.php"; ?>
					<!-- linkedin.modal.php -->
					<!-- name.modal.php -->
					<?php include "parts".DIRECTORY_SEPARATOR."name.modal.php"; ?>
					<!-- name.modal.php -->
					<!-- password.modal.php -->
					<?php include "parts".DIRECTORY_SEPARATOR."password.modal.php"; ?>
					<!-- password.modal.php -->
				</div>
				<!-- div.right-area -->
			</div>
			<!-- div.col-md-9 -->
		</div>
		<!-- div.row -->
	</div>	
	<!-- div.container -->
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script type="text/javascript" src="../assets/js/simple.js"></script>
    <script type="text/javascript" src="./js/profile.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>