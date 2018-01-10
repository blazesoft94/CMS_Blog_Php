
<?php 
include_once "includes/db.php";
include_once "admin/includes/functions.php";
include "includes/header.php";
// if(isset($_POST["signin"])){
//     $username = $_POST["username"];
//     $password = $_POST["password"];
//     $sql = "SELECT * from users where user_username = '$username' and user_password = '$password'";
//     $result = $con->query($sql);
//     if($result->num_rows>0){
//         $row = $result->fetch_assoc();
        // $_SESSION["role"] = $row["user_role"];
        // $_SESSION["username"]= $row["user_username"];
        // $_SESSION["login"] = true;
//     }
// }
if(isset($_POST["logoutButton"])){
    $_SESSION["role"] = "none";
    $_SESSION["username"]= "none";
    $_SESSION["login"] = false;
}
signIn();
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

                <h1 class="display-3 page-header">
                    Abdul Rehman &amp; Nehal Project
                    <small class="muted">Dr Nosheen Sabahat</small>
                </h1>
                <!-- First Blog Post -->
                <?php 
                    $sql = "SELECT * from posts ORDER by post_id desc";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            $post_id = $row["post_id"];
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_text = $row["post_text"];
                            $post_image = $row["post_image"];
                            


                            // echo "<h2><a href='#'>Blog Post Title</a></h2><p class='lead'>by<a href='index.php'>Start Bootstrap</a></p><p><span class='glyphicon glyphicon-time'></span> Posted on August 28, 2013 at 10:00 PM</p><hr><img class='img-responsive' src='http://placehold.it/900x300' alt=''><hr><p>Lorem </p><a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a><hr>";
                ?>
                         <h2>
                            <a href="post.php?<?php echo "post_id=$post_id&post_view=true" ?>"><?php echo $post_title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                            <hr>
                            <p><?php echo get_words($post_text) ?>...</p>
                            <a class="btn btn-primary" href="post.php?<?php echo "post_id=$post_id&post_view=true" ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                        
                <?php        }
                    }
                
                ?>
                




                <!-- <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

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


</body>

</html>
