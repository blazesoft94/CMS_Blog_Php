<?php 
include_once "includes/db.php";
if(!empty($_POST["email"])) {
    $email = $_POST["email"];
    $sql = "SELECT * from users where user_email = '$email'";
    $result = $con->query($sql);
    if($result->num_rows>0){
        echo '{"available": "false"}';
    }
    else{
        echo '{"available": "true"}';
    }

}
?>