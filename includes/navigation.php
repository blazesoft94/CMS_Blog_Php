<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS Project</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- <?php    
                    $sql = "SELECT * from categories";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='#'>$cat_title</a></li>";
                        }
                    }
                ?> -->
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <?php if(isset($_SESSION["login"])){
                    if($_SESSION["role"]=="admin"){
                ?>
                <li><a href="admin">Admin</a></li>
                <?php }}?>
                <?php if(isset($_SESSION["login"])){
                    if($_SESSION["login"]==true) {?>
                <li class="dropdown nav-right-li ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i> <?php echo $_SESSION["username"] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" id="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                    <form style="display:none;" action="index.php" method="POST">
                        <button type="submit" name="logoutButton" id="logoutButton">
                    </form>
                </li>
                <?php }else{ ?>
                <li class="nav-right-li">
                <button type="button" data-toggle="modal" data-target="#signIn" class="btn btn-primary navbar-btn ">Sign in</button>
                <button type="button" data-toggle="modal" data-target="#signUp" class="btn btn-warning navbar-btn ">Sign up</button>
                </li>
                <?php }} ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Sign In</h4>
            <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="index.php" method="POST">
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="username" class="col-form-label">Username:</label>
                    <input type="text" id="signinUsername" class="form-control"  name="username" required>
                    <span id="wrongUsername" style="display:none;" class="text-warning"> wrong username</span>
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">Password:</label>
                    <input id="signinPassword" type="password" class="form-control" name="password" required>
                    <span id="wrongPassword" style="display:none;" class="text-warning"> wrong password</span>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="signinButton" class="btn btn-primary">Sign in</button>
                <button style="display:none;" type="submit" id="signinSubmit" name="signin" class="btn btn-primary">Transparent Button</button>
            </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Sign Up</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="" method="POST"> -->
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="signupUsername"  name="username" required>
                        <span id="usernameAvailability"></span>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-form-label">Email:</label>
                        <input type="email" id="signupEmail" class="form-control" name="email" required>
                        <span id="emailAvailability"></span>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-form-label">First Name:</label>
                        <input id="firstname" type="text" class="form-control" name="firstname"required>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-form-label">Last Name:</label>
                        <input id = "lastname" type="text" class="form-control" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Password:</label>
                        <input type="password" id="pass1" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Re-Enter Password:</label>
                        <input type="password" id="pass2" class="form-control" name="password2" required>
                        <span id="passMatch"></span>
                    </div>
                    <p id="signupEnd" class="text-success" style="display:none;" ><b> Congratulations! Your account has been created. <b></p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" id="signupCancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="signupSubmit" name="signUp" class="btn btn-primary">Sign Up</button>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<script src="js/navigation.js"></script>