<?php 
require_once "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."connection".DIRECTORY_SEPARATOR."db.php";
// var_dump($db);
//echo json_encode(array("db"=>var_dump($db)));
function bio(){
	if(isset($_GET["bio"]) && !empty(trim($_GET["bio"]))){
		global $db;
		/** getting bio from the users table */
		$select_bio = $db->prepare("SELECT `bio` from `users` where `id` = :id");
		$select_bio->bindParam(":id",$_SESSION["id"]);
		$select_bio->execute();
		$result_bio = $select_bio->fetch(PDO::FETCH_OBJ);
		$bio_db = trim($result_bio->bio);
		error_log($bio_db);
		/** getting bio from the users table */
		
		$bio = trim($_POST["bio"]);
		$update_bio = $db->prepare("UPDATE `users` SET `bio` = :bio where `id` = :id");
		$update_bio->bindParam(":bio",$bio);
		$update_bio->bindParam(":id",$_SESSION["id"]);
		$update_bio->execute();
		//echo json_encode(array("value"=>$update_bio->rowCount()));die();
		if($update_bio){
			if(!empty($bio_db)){
				$_SESSION["bio_success"]="<i class='fa fa-check-circle'></i> Your Bio Have Been Successfully Update";
				echo json_encode(array("error"=>"success"));
			}else{
				$_SESSION["bio_success"]="<i class='fa fa-check-circle'></i> Your Bio Have Been Successfully Added";
				echo json_encode(array("error"=>"success"));
			}			
		}else{
			echo json_encode(array("error"=>"error"));
		}
	}
}
bio();
?>