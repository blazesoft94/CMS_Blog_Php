<?php
    include "includes/header.php";
?>
<?php if(isset($_SESSION["login"]) && $_SESSION["role"]=="admin"){?>
<?php 
//delete post
deleteUser();
editUser();

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
                            <small class="muted">Users</small>
                        </h1>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Change Role</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display Posts
                                        $sql = "SELECT * from users ORDER BY user_id desc";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            while($row = $result->fetch_assoc()){
                                                $u_id = $row['user_id'];
                                                $u_username = $row['user_username'];
                                                $u_email = $row["user_email"];
                                                $u_firstname = $row['user_firstname'];
                                                $u_lastname = $row['user_lastname'];
                                                $u_role = $row["user_role"];
                                                echo "<tr>";
                                                echo "<td>{$u_id}</td>";
                                                echo "<td>{$u_firstname}</td>";
                                                echo "<td>{$u_lastname}</td>";
                                                echo "<td>{$u_username}</td>";
                                                echo "<td>{$u_email}</td>";
                                                echo "<td class=";
                                                if($u_role == "admin"){
                                                    echo "'text-success'";
                                                }
                                                else{
                                                    echo "'text-dark'";
                                                }
                                                echo ">{$u_role}</td>";
                                                echo "<td><a href='#' type='button' class='' data-toggle='modal' data-id='$u_id' data-target='#user_edit_role' data-role='$u_role' >Edit</a></td>";
                                                echo "<td><a href='users.php?delete={$u_id}'>Delete</a></td>";
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
            

            <div class="modal fade" id="user_edit_role" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Change User Role</h4>
                            <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="users.php" method="POST">
                            <div class="modal-body">
                                
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Role:</label>
                                    <select class="form-control" id="user_role" name="user_role">
                                        <option id="user_role_option1" selected></option>
                                        <option id="user_role_option2"></option>
                                    </select>
                                </div>
                                <input style="display:none;" type="text" class="d-none" name="user_id" id="user_id">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="edit_user" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<script>
    
$('#user_edit_role').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('role') // Extract info from data-* attributes
    var id = button.data('id');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #user_role_option1').text(recipient);
    if(recipient == "user"){
        modal.find('.modal-body #user_role_option2').text("admin");
    }
    else{
        modal.find('.modal-body #user_role_option2').text("user");
    }
    modal.find('.modal-body #user_id').val(id);
    modal.find()
    
})

</script>
<?php
    include "includes/footer.php";
?>
<?php }
else{
    header("Location: ../index.php");
}
?>