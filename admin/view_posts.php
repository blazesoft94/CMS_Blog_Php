<?php
    include "includes/header.php";
?>
<?php 
//delete post
deletePost();
    
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include "includes/navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel
                            <small class="muted">Categories</small>
                        </h1>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Category Id</th>
                                            <th>Author</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display Posts
                                        $sql = "SELECT * from posts ORDER BY post_id desc";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            while($row = $result->fetch_assoc()){
                                                $p_id = $row['post_id'];
                                                $p_title = $row['post_title'];
                                                $p_cat_id = $row['post_cat_id'];
                                                $p_author = $row['post_author'];
                                                $p_image = $row['post_image'];
                                                $p_date = $row['post_date'];
                                                echo "<tr>";
                                                echo "<td>{$p_id}</td>";
                                                echo "<td>{$p_title}</td>";
                                                echo "<td>{$p_cat_id}</td>";
                                                echo "<td>{$p_author}</td>";
                                                echo "<td><img width='100' src='../images/{$p_image}'></img></td>";
                                                echo "<td>{$p_date}</td>";
                                                echo "<td><a href='view_posts.php?delete={$p_id}'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                        }
                                    ?>  
                                        <!-- <tr>
                                            <th scope="row">1</th>
                                            <td>John</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- <div class="modal fade" id="cat_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Edit Category</h4>
                    <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="categories.php" method="POST">
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="cat_title" name="cat_title">
                        </div>
                        <input style="display:none;" type="text" class="d-none" name="cat_id" id="cat_id">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit_title" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
<?php
    include "includes/footer.php";
?>
