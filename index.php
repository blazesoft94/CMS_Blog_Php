
<?php 
include "includes/db.php";
include "includes/header.php";
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
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_text = $row["post_text"];
                            $post_image = $row["post_image"];


                            // echo "<h2><a href='#'>Blog Post Title</a></h2><p class='lead'>by<a href='index.php'>Start Bootstrap</a></p><p><span class='glyphicon glyphicon-time'></span> Posted on August 28, 2013 at 10:00 PM</p><hr><img class='img-responsive' src='http://placehold.it/900x300' alt=''><hr><p>Lorem </p><a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a><hr>";
                ?>
                         <h2>
                            <a href="#"><?php echo $post_title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                            <hr>
                            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                            <hr>
                            <p><?php echo $post_text ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                        
                <?php        }
                    }
                
                ?>
                




                <h2>
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

                <hr>


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
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
