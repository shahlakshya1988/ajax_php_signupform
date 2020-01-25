<?php 
function links(){
	global $db;
	$query = $db->prepare("SELECT * FROM `users` where id = :id");
	$query->bindParam(":id",$_SESSION["id"]);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_OBJ);
	// var_dump($result);
	if(empty(trim($result->image))){
		$photo = "<img src='./img/no_img.png' class='user_img'/>";
		$photo_link = "<a href='add_photo.php'>Update Photo <i class='fa fa-pencil'></i></a>";
	}else{
		$photo = "<img src='./img/{$result->image}' class='user_img'>";
		$photo_link = "<a href='add_photo.php'>Update Photo <i class='fa fa-pencil'></i></a>";
	}
	if(empty(trim($result->bio))){
		$bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fa fa-plus-circle'></i></a>";
	}else{
		$bio = "<a href='#' data-target='#bio' data-toggle='modal'>Update Bio <i class='fa fa-pencil'></i></a>";
	}
	if(empty(trim($result->address))){
		$address = "<a href='address.php' >Add Address <i class='fa fa-plus-circle'></i></a>";
	}else{
		$address = "<a href='address.php' >Update Address <i class='fa fa-pencil'></i></a>";
	}
	if(empty(trim($result->facebook))){
		$facebook = "<a href='#' data-target='#facebookModal' data-toggle='modal'>Add Facebook <i class='fa fa-plus-circle'></i></a>";
	}else{
		$facebook = "<a href='#' data-target='#facebookModal' data-toggle='modal'>Update Facebook <i class='fa fa-pencil'></i></a>";
	}
	if(empty(trim($result->linkedin))){
		$linkedin = "<a href='#' data-target='#linkedinModal' data-toggle='modal'>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
	}else{
		$linkedin = "<a href='#' data-target='#linkedinModal' data-toggle='modal'>Update Linkedin <i class='fa fa-pencil'></i></a>";
	}
	echo "<ul class='list-group'>
		$photo
		<li class='list-group-item first-li'>$photo_link</li>
		<li class='list-group-item'>$bio</li>
		<li class='list-group-item'>$address</li>
		<li class='list-group-item'>$facebook</li>
		<li class='list-group-item'>$linkedin</li>
		<li class='list-group-item'><a href='#' data-target='#passwordModal' data-toggle='modal' >Update Password <i class='fa fa-pencil'></i> </a></li>	
		<li class='list-group-item'><a href='#' data-target='#nameModal' data-toggle='modal'>Update Name <i class='fa fa-pencil'></i> </a></li>	
	</ul>";
	//echo "<br>Links Area Goes here<br>";
}
function update_picture(){
	global $db;
	if(isset($_POST["picture"])){
		$img_name = strtolower($_FILES["file"]["name"]);
		$img_tmp_name = $_FILES["file"]["tmp_name"];
		$img_error = $_FILES["file"]["error"];
		$img_size = $_FILES["file"]["size"];
		$store = "img/";
		$extensions = array("png","PNG","jpg","JPG","jpeg","JPEG");
		$image_name_array = explode(".",$img_name);
		$img_extension = end($image_name_array);
		
		if(in_array($img_extension,$extensions)){
			$count =1;
			$newname = uniqid(true);
			while(file_exists($store.$img_name)){
				$img_name =$count."_".$newname.".".$img_extension;
				$count++;
			}
			move_uploaded_file($img_tmp_name,$store.$img_name);
			$query = $db->prepare("UPDATE `users` SET `image` = :image WHERE `id` = :id LIMIT 1");
			$query->bindParam(":image",$img_name);
			$query->bindParam(":id",$_SESSION["id"]);
			$query->execute();
			if($query->rowCount()){
				$_SESSION["image_success"] = "<i class='fa fa-check-circle'></i> You Image Is Successfully Updated";
				header("Location: index.php");
				die();
			}else{

			}
		}else{
			echo '<div class="text-center text-danger">Invalid Image Extension!</div>';
		}
	}
}

function user_info(){
	global $db;
	$user_id = $_SESSION["id"];
	$query = $db->prepare("SELECT * FROM `users` where `id` = :id");
	$query->execute(array(":id"=>$user_id));
	$r = $query->fetch(PDO::FETCH_OBJ);
	$name =ucwords($r->name);
	if(!empty(trim($r->address))){
		$address = trim($r->address);
	}else{
		$address="<a href='address.php' >Add Address <i class='fa fa-plus-circle'></i></a>";
	}
	if(!empty(trim($r->bio))){
		$bio = trim($r->bio);
	}else{
		$bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fa fa-plus-circle'></i></a>";
	}

	if(!empty(trim($r->facebook))){
		$facebook = "<a href='{trim($r->facebook)}'><i class='fa fa-facebook'> Facebook</i></a>";
	}else{
		$facebook = "<a href='#' data-target='#facebookModal' data-toggle='modal'>Add Facebook <i class='fa fa-plus-circle'></i></a>";
	}


	if(!empty(trim($r->linkedin))){
		$linkedin = "<a href='{trim($r->linkedin)}'><i class='fa fa-linkedin'></i> Linkedin</a>";
	}else{
		$linkedin = "<a href='#' data-target='#linkedinModal' data-toggle='modal'>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
	}
	
	echo "<div class='row user-info'><div class='col-md-3'><span>Name :</span> </div><div class='col-md-9'>{$name}</div></div>";
	echo "<div class='row user-info'><div class='col-md-3'><span>Address :</span> </div><div class='col-md-9'>{$address}</div></div>";
	echo "<div class='row user-info'><div class='col-md-3'><span>Bio :</span> </div><div class='col-md-9'>{$bio}</div></div>";
	echo "<div class='row user-info'><div class='col-md-3'><span>Facebook :</span> </div><div class='col-md-9'>{$facebook}</div></div>";
	echo "<div class='row user-info'><div class='col-md-3'><span>Linkedin :</span> </div><div class='col-md-9'>{$linkedin}</div></div>";


}
?>