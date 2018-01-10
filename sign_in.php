<?php 
include_once "includes/db.php";
if(!empty($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * from users where user_username = '$username'";
    $result = $con->query($sql);
    if($result->num_rows>0){
        $sql = "SELECT * from users where user_username = '$username' and user_password = '$password'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            echo '{"login":"true"}';
            while($row = $result->fetch_assoc()){
                $_SESSION["role"]=$row["user_role"];
            }
        }
        else{
            echo '{"login": "false", "username" : "true", "password":"false"}';
        }
    }
    else{
        echo '{"login": "false", "username" : "false"}';
    }

}
?>