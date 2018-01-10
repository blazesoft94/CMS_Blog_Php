<?php 
include_once "includes/db.php";
if(!empty($_POST["username"])) {
    $username = $_POST["username"];
    $sql = "SELECT * from users where user_username = '$username'";
    $result = $con->query($sql);
    if($result->num_rows>0){
        echo '{"available": "false"}';
    }
    else{
        echo '{"available": "true"}';
    }

}
?>