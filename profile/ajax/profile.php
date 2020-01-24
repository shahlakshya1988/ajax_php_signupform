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

function facebook(){
	global $db;
	if(isset($_GET["facebook"]) && !empty(trim($_GET["facebook"]))){
		//echo json_encode($_REQUEST);
		$get_facebook = $db->prepare("Select `facebook` from `users` where `id` = :id");
		$get_facebook->execute(array(":id"=>$_SESSION["id"]));
		$result_facebook = $get_facebook->fetch(PDO::FETCH_OBJ);
		$facebook_db = trim($result_facebook->facebook);

		$update_facebook = $db->prepare("UPDATE `users` SET `facebook` = :facebook WHERE `id` = :id");
		$update_facebook->execute(array(":id"=>$_SESSION["id"],":facebook"=>trim($_POST["facebook_input"])));
		if($update_facebook){
			if(!empty($facebook_db)){
				$_SESSION["facebook_success"]="<i class='fa fa-check-circle'></i> Your Facebook Have Been Successfully Update";
				echo json_encode(array("error"=>"success"));
			}else{
				$_SESSION["facebook_success"]="<i class='fa fa-check-circle'></i> Your Facebook Have Been Successfully Added";
				echo json_encode(array("error"=>"success"));
			}
		}else{
			echo json_encode(array("error"=>"error"));
		}
	}
}
facebook();
function add_linkedin(){
	global $db;
	if(isset($_GET["linkedin"]) && !empty(trim($_GET["linkedin"]))){
		//echo json_encode($_REQUEST);
		/*** getting linkedin from db */
		$get_linkedin = $db->prepare("SELECT `linkedin` from `users` where `id` = :id");
		$get_linkedin->execute(array(":id"=>$_SESSION["id"]));
		$res_linkedin = $get_linkedin->fetch(PDO::FETCH_OBJ);
		$linkedin_db = $res_linkedin->linkedin;
		/*** getting linkedin from db */

		/*** update linkedin in db */
		$update_linkedin= $db->prepare("UPDATE `users` SET `linkedin` = :linkedin where `id` = :id LIMIT 1");
		$update_linkedin->bindParam(":linkedin",$_POST["linkedin_input"]);
		$update_linkedin->bindParam(":id",$_SESSION["id"]);
		$update_linkedin->execute();
		
		
 		if($update_linkedin){
			
			if(!empty(trim($linkedin_db))){
				$_SESSION["linkedin_success"] ="<i class='fa fa-check-circle'></i> Updated Linkedin Account";
			}else{
				$_SESSION["linkedin_success"] ="<i class='fa fa-check-circle'></i> Added Linkedin Account";
			}
			echo json_encode(array("error"=>"success"));
		}else{
			echo json_encode(array("error"=>"error"));
		}
		/*** update linkedin in db */
	}
}
add_linkedin();
?>