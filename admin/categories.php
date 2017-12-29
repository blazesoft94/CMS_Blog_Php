<?php
    include "includes/header.php";
?>
<?php 
//delete category
    if(isset($_GET['delete'])){
        $cat_id = $_GET['delete'];
        $sql = "DELETE FROM categories WHERE cat_id = {$cat_id}";
        $con->query($sql);
        header("Location: categories.php");
    }
?>

<?php 
    //Add category
    if(isset($_POST["submit"])){
        $cat_title = myValidator($_POST['cat_title']);
        if($cat_title == "" || empty($cat_title)){
            echo "<div><p class='text-danger'>* The input field must not be empty</p></div>";
        }
        else{
            $sql = "INSERT into categories (cat_title) values ('$cat_title')";
            $con->query($sql);
        }
    }
    if(isset($_POST["edit_title"])){
        $cat_title = $_POST["cat_title"];
        $cat_id = $_POST["cat_id"];
        $sql = "UPDATE categories set cat_title = '{$cat_title}' WHERE cat_id = $cat_id";
        $con->query($sql);
    }
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
                            <div class="col-md-4">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cat_title">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display all categories
                                        $sql = "SELECT * from categories";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            while($row = $result->fetch_assoc()){
                                                $cat_title = $row['cat_title'];
                                                $cat_id = $row['cat_id'];
                                                echo "<tr><th scope='row'>$cat_id</th><td>$cat_title</td>";
                                                echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                                echo '<td><a href="#" type="button" class="" data-toggle="modal" data-id="' .$cat_id .'"data-target="#cat_edit_modal" data-title="' .$cat_title .'">Edit</a></td></tr>';
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
    <div class="modal fade" id="cat_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
    </div>
<?php
    include "includes/footer.php";
?>
<script src="js/categories.js"></script>
