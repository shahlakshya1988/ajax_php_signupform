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
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam qui hic corporis temporibus magnam esse reiciendis tempora, placeat ad! Rem reiciendis aliquid iste recusandae ea odio possimus quod! Eligendi atque sapiente totam, aliquam ex quod! Quos quo, obcaecati perspiciatis aut praesentium hic molestias optio magnam voluptas. Eaque, ad natus quaerat.
					<!-- code for modal -->
					<div class="modal fade" id="bio" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Bio</h5>
									<button type="button" class="close" data-dismiss="modal" aria-lable="close"><span aria-hidden="true">&times;</span></button>
								</div>
								<!-- div.modal-header -->
								<div class="modal-body">
									<form action="">
										<div class="form-group">
											<textarea class="form-control" id="bio_textarea" name="" id="" cols="30" rows="10" placeholder="Add Bio"></textarea>
											<!-- textarea.form-control#bio_textarea -->
										</div>
										<!-- div.form-group -->
										<div class="modal-footer">
											<div class="form-group">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-success">Add</button>
											</div>
											<!-- div.form-group -->
										</div>
										<!-- div.modal-footer -->
									</form>
									<!-- form -->
								</div>
								<!-- div.modal-body -->
							</div>
							<!-- div.modal-content -->
						</div>
						<!-- div.modal-dialog -->
					</div>
					<!-- code for modal -->
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
    <script type="text/javascript" src="../assets/js/signup.js"></script>
    <script type="text/javascript" src="../assets/js/login.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>