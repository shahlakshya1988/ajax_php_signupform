<?php 
function links(){
	global $db;
	$query = $db->prepare("SELECT * FROM `users` where id = :id");
	$query->bindParam(":id",$_SESSION["id"]);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_OBJ);
	//var_dump($result);
	if(empty($result->image)){
		$photo = "<img src='./img/no_img.png' class='user_img'/>";
		$photo_link = "<a href=''>Update Photo</a>";
	}else{
		$photo = "<img src='./img/{$result->image}' class='user_img'>";
		$photo_link = "<a href=''>Update Photo</a>";
	}
	if(empty($result->bio)){
		$bio = "<a href=''>Add Bio</a>";
	}else{
		$bio = "<a href=''>Update Bio</a>";
	}
	if(empty($result->facebook)){
		$facebook = "<a href=''>Add Facebook</a>";
	}else{
		$facebook = "<a href=''>Update Facebook</a>";
	}
	if(empty($result->linkedin)){
		$linkedin = "<a href=''>Add Linkedin</a>";
	}else{
		$linkedin = "<a href=''>Update Linkedin</a>";
	}
	echo "<ul class='list-group'>
		$photo
		<li class='list-group-item first-li'>$photo_link</li>
		<li class='list-group-item'>$bio</li>
		<li class='list-group-item'>$facebook</li>
		<li class='list-group-item'>$linkedin</li>
	</ul>";
	//echo "<br>Links Area Goes here<br>";
}
?>