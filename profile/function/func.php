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
		$photo_link = "<a href=''>Update Photo <i class='fa fa-pencil'></i></a>";
	}else{
		$photo = "<img src='./img/{$result->image}' class='user_img'>";
		$photo_link = "<a href=''>Update Photo <i class='fa fa-pencil'></i></a>";
	}
	if(empty(trim($result->bio))){
		$bio = "<a href=''>Add Bio <i class='fa fa-plus-circle'></i></a>";
	}else{
		$bio = "<a href=''>Update Bio <i class='fa fa-pencil'></i></a>";
	}
	if(empty(trim($result->facebook))){
		$facebook = "<a href=''>Add Facebook <i class='fa fa-plus-circle'></i></a>";
	}else{
		$facebook = "<a href=''>Update Facebook <i class='fa fa-pencil'></i></a>";
	}
	if(empty(trim($result->linkedin))){
		$linkedin = "<a href=''>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
	}else{
		$linkedin = "<a href=''>Update Linkedin <i class='fa fa-pencil'></i></a>";
	}
	echo "<ul class='list-group'>
		$photo
		<li class='list-group-item first-li'>$photo_link</li>
		<li class='list-group-item'>$bio</li>
		<li class='list-group-item'>$facebook</li>
		<li class='list-group-item'>$linkedin</li>
		<li class='list-group-item'><a href=''>Update Password <i class='fa fa-pencil'></i> </a></li>	
		<li class='list-group-item'><a href=''>Update Name <i class='fa fa-pencil'></i> </a></li>	
	</ul>";
	//echo "<br>Links Area Goes here<br>";
}
?>