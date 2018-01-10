<?php
include_once "includes/db.php";
if(isset($_POST["submitVote"])){
    $vote = $_POST["vote"];
    $post_id = $_POST["post_id"];
    $user_id = $_POST["user_id"];
    $sql = "INSERT INTO polls (poll_post_id, poll_user_id,poll_vote) values('$post_id','$user_id','$vote')";
    if($con->query($sql)==TRUE){
        echo '{"pollAdded" : "true"}';
    }
    else{
        echo '{"pollAdded" : "false"}';
    }
}

?>