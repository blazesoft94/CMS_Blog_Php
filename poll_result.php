<?php    
    include_once "includes/db.php";
    if(isset($_POST["poll_result"])){
        $p_id = $_POST["post_id"];
        $sql = "SELECT * from polls where poll_post_id = $p_id";
        $result = $con->query($sql);
        $yes=0;
        $no=0;
        $yes_percentage = 50;
        $no_percentage = 50;
        if($result->num_rows>0){
            $yes=0;
            $no=0;
            while($row=$result->fetch_assoc()){
                if($row["poll_vote"]=="yes"){
                    $yes++;
                }
                elseif($row["poll_vote"]=="no"){
                    $no++;
                }
                else{
                    echo "neither yes nor no";
                }
            }
            $total = $yes+$no;
            if($total==0){
                $yes_percentage = 50;
                $no_percentage = 50;
            }
            else{
                $yes_percentage = ($yes/$total)*100;
                $no_percentage = 100 - $yes_percentage;
            }
        }
        echo '{"yes" : "' .$yes .'", "no" : "' .$no .'", "yes_percentage" : "' .$yes_percentage .'", "no_percentage" : "' .$no_percentage .'"}'; 
    }
?>