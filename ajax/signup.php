<?php 
require "../connection/db.php";
//var_dump($db);

function check_email(){
    GLOBAL $db;
    if(isset($_POST["check_email"]) && !empty(trim($_POST["check_email"]))){
        // echo json_encode($_POST["check_email"]);
        $email = trim($_POST["check_email"]);
        $sql = "SELECT `email` FROM `users` where `email` = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            // email dones not exictes
                echo json_encode(array("error"=>"email_success"));
            // email dones not exictes
        }else{
            echo json_encode(array("error"=>"email_fail","message"=>"This email already exists"));
        }
        
    }
}
check_email();
?>