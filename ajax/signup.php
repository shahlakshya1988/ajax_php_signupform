<?php 
if(isset($_POST["check_email"]) && !empty($_POST["check_email"])){
    // echo json_encode($_POST["check_email"]);
    $array = [
        "name"=>"Lakshya Shah",
        "email"=>"shahlakshya1988@gmail.com",
        "address"=>"India"
    ];
    echo json_encode($array);
}
?>