<?php 
require "../connection/db.php";
function login(){
    global $db;
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $stmt = $db->prepare("SELECT * FROM `users` where `email` = :email ");
    $stmt->bindParam(":email",$email);
    // $stmt->bindParam(":password",$password);
    $stmt->execute();
    if($stmt->rowCount()){
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $password_db = $result->password;
        $user_name = $result->name;
        $id = $result->id;
        if(password_verify($password,$password_db)){
        //echo json_encode(array("password"=>$password_db,"username"=>$user_name,"id"=>$id)); die();
            
            $_SESSION["user_name"] = $user_name;           
            $_SESSION["id"] = $id;     
            // echo json_encode($_SESSION); die();      
            // echo json_encode(array("error"=>"success","msg"=>"success.php","session"=>$_SESSION));
            echo json_encode(array("error"=>"success","msg"=>"profile/index.php"));
        }else{
            echo json_encode(array("error"=>"no_password","msg"=>"Please Enter Correct Password"));
        }
        
    }else{
        echo json_encode(array("error"=>"no_email","msg"=>"Please Enter Correct Email"));
    }
    //echo json_encode($stmt);
    
}
if(isset($_REQUEST["login_form"]) && !empty(trim($_REQUEST["login_form"]))){
    login();
}
?>