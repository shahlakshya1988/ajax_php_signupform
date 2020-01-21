<?php 
require_once __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."connection".DIRECTORY_SEPARATOR."db.php"; 
require_once __DIR__.DIRECTORY_SEPARATOR."function".DIRECTORY_SEPARATOR."func.php";
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