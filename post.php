
<?php 
include_once "includes/db.php";
include_once "admin/includes/functions.php";
include "includes/header.php";

addComment();
?>

<body>

    <!-- Navigation -->
    <?php
        include "includes/navigation.php";
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="display-2 page-header text-success">
                    Post
                    <small class="muted"> Abdul Rehman &amp; Nehal Asif</small>
                </h1>

                <?php 
                if(isset($_GET["post_view"])){
                    $p_id = $_GET["post_id"];

                    $sql = "SELECT * from posts where post_id = '$p_id'";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_text = $row["post_text"];
                            $post_image = $row["post_image"];


                            // echo "<h2><a href='#'>Blog Post Title</a></h2><p class='lead'>by<a href='index.php'>Start Bootstrap</a></p><p><span class='glyphicon glyphicon-time'></span> Posted on August 28, 2013 at 10:00 PM</p><hr><img class='img-responsive' src='http://placehold.it/900x300' alt=''><hr><p>Lorem </p><a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a><hr>";
                ?>
                        <h1 class="text-warning text-center"><u>
                            <a href="#"><?php echo $post_title ?></a>
                        </u></h1>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                            <hr>
                            <p><?php echo "$post_text" ?></p>

                        <hr>

                        
                <?php        }
                    }
                }
                ?>
                <?php if(isset($_SESSION["login"])){
                    if($_SESSION["role"]=="user" || $_SESSION["role"]=="admin"){
                ?>
                    <div class="well">
                        <h2 class="text-primary text-center" ><u>POLL</u></h2>
                        <hr>
                        <h3>Did you find this post interesting?</h4>
                        <div id="poll-form">   
                            <div><input class="vote" type="radio" checked name="vote" value="yes"> Yes</div>
                            <div><input class="vote" type="radio" name="vote" value="no"> No</div>
                            <br>
                            <input id="poll_post_id" style="display:none;" type="text" name="post_id" value="<?php echo $p_id ?>">
                            <input id="poll_user_id" style="display:none;" type="text" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
                            <button type="submit" id="submitVote" name="submitVote" class="btn btn-primary">Vote</button>
                            <button id="viewResults" class="btn btn-info">View Results</button>
                        </div>

                        <div id="poll-result" style="display:none;">
                            <h4>Result</h4>
                            <?php    
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
                            ?>
                            <div class="progress ">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="<?php echo "width:$yes_percentage%"; ?>">
                                <span id="poll-result-yes"><?php echo $yes;?> Yes</span> 
                                </div>
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="<?php echo "width:$no_percentage%"; ?>">
                                    <span id="poll-result-no"><?php echo $no;?> No</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                <?php }}?>

                <?php include "post_comment.php"; ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
                include "includes/sidebar.php"
            ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Abdul Rehman 18-11071 Nehal Asif 18-11070</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->


    <script src="js/postscript.js"></script>

</body>

</html>



