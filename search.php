
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
                <hr>
                <?php
                    $search = "";
                    if(isset($_GET['submit'])){
                        $search = $_GET['search'];
                    }
                ?>
                <h2 class="display-4 text-success mb-3">Search Results for <span class=" font-italic text-dark">"<?php echo "$search"?>"</span> </h2>
                <hr>
                <!-- First Blog Post -->
                <?php 
                if(!empty($search)){
                    
                    $sql = "SELECT * from posts where post_tags LIKE '%$search%' ORDER by post_id desc ";
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

                        
                <?php  }
                    }
                    else{
                        echo "<h3 class='text-danger'>NO HITS!</h3>";
                    }
                }
                
                ?>

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
