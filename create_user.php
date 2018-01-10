<?php 
include_once "includes/db.php";
if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $sql = "INSERT into users (user_username, user_firstname, user_lastname,user_email,user_password) values ('$username','$firstname','$lastname','$email','$password')";
    if($con->query($sql) == TRUE){
        echo '{"added" : "true"}';
    }
    else{
        echo '{"added" : "false"}';
    }
}
?>