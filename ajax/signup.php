<?php 
require "../connection/db.php";
//var_dump($db);
if(isset($_POST["check_email"]) && !empty(trim($_POST["check_email"]))){
    function check_email(){
        GLOBAL $db;
       // echo json_encode($_POST["check_email"]); die();
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
}
//echo "<pre>",print_r($_REQUEST),"</pre>";
if(isset($_GET["signup"]) && !empty(trim($_GET["signup"])) && trim($_GET["signup"])=="true" ){
    //var_dump($_REQUEST);
    //var_dump("Hello");
    function signup_submit(){
        GLOBAL $db;
        //echo json_encode($_REQUEST);die();

        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirm = trim($_POST["confirm"]);
       // echo $name;
        echo json_encode($_REQUEST);
    }
    signup_submit();
}


?>