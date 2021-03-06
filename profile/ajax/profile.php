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

function change_password(){
	global $db;
	//echo json_encode($_REQUEST); die();
	if(isset($_GET["password"]) && !empty(trim($_GET["password"]))){
		/*** getting old password, from db */
		$get_old_pass =$db->prepare("SELECT `password` from `users` where `id` = :id");
		$get_old_pass->bindParam(":id",$_SESSION["id"]);
		$get_old_pass->execute();
		$result_old_pass = $get_old_pass->fetch(PDO::FETCH_OBJ);
		$password_db = $result_old_pass->password;
		
		if(password_verify(trim($_POST["old_password"]),$password_db)){
			$update_new_password = $db->prepare("UPDATE `users` SET `password` = :password where `id` = :id LIMIT 1");
			$update_new_password->bindParam(":id",$_SESSION["id"]);
			$crcypt_new_password = password_hash(trim($_POST["new_password"]),PASSWORD_DEFAULT);
			$update_new_password->bindParam(":password",$crcypt_new_password);
			$update_new_password->execute();
			if($update_new_password){
				$_SESSION["password_success"] = "<i class='fa fa-check-circle'></i> Password Updated Successfully !!!";
				echo json_encode(array("error"=>"success","new_password"=>trim($_POST["new_password"])));
			}else{

			}
			
		}else{
			echo json_encode(array("error"=>"password_error","msg"=>"Please Enter Current Password Properly!!!"));
		}
		/*** getting old password, from db */
	}
	
}
change_password();
function update_name(){
	global $db;
	if(isset($_GET["name"]) && !empty(trim($_GET["name"]))){
		//echo json_encode($_REQUEST);
		$new_name = trim($_POST["name_input"]);
		$update = $db->prepare("UPDATE `users` SET `name` = :name where `id` = :id");
		$update->bindParam(":name",$new_name);
		$update->bindParam(":id",$_SESSION["id"]);
		$update->execute();
		if($update){
			$_SESSION["name_success"] = "<i class='fa fa-check-circle'></i> Name Have Been Updated Successfully";
			echo json_encode(array("error"=>"success"));
		}else{
			echo json_encode(array("error"=>"error"));
		}

	}
}
update_name();
function add_address(){
	global $db;
	if(isset($_GET["address"]) && !empty(trim($_GET["address"]))){
		//echo json_encode($_REQUEST);
		$new_address = trim($_REQUEST["new_address"]);
		/*** getting if there is some value or not */
		$get_address = $db->prepare("SELECT `address` FROM `users` WHERE `id` = :id");
		$get_address->execute(array(":id"=>$_SESSION["id"]));
		$res_address = $get_address->fetch(PDO::FETCH_OBJ);
		$address_db = $res_address->address;
		
		/*** getting if there is some value or not */

		/*** query for upding the address */
		$update_address = $db->prepare("UPDATE `users` SET `address` = :address WHERE `id` = :id");
		$update_address->execute(array(":address"=>$new_address,":id"=>$_SESSION["id"]));
		if($update_address){
			if(trim($address_db) != ''){
				$_SESSION["address_success"] = "<i class='fa fa-check-circle'></i> Address Have Been Updated Successfully";
			}else{
				$_SESSION["address_success"] = "<i class='fa fa-check-circle'></i> Address Have Been Added Successfully";
			}
			echo json_encode(array("error"=>"success"));
		}
		/*** query for upding the address */

	}
}

add_address();
?>