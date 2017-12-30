<div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <form method="GET" action="search.php">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit" value="TRUE">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                    <?php    
                        $cat_col1 = array();
                        $cat_col2 = array();
                        $sql = "SELECT * from categories";
                        $result = $con->query($sql);
                        if($result->num_rows>0){
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                                if($count%2 == 0){
                                    array_push($cat_col1,$row['cat_title']);
                                }
                                else{
                                    array_push($cat_col2,$row['cat_title']);
                                }
                                $count++;
                                //echo "<li><a href='#'>$cat_title</a></li>";
                            }
                        }
                    ?>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php 
                            foreach($cat_col1 as $value){
                                echo "<li><a href='#'>$value</a></li>";
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php 
                            foreach($cat_col2 as $value){
                                echo "<li><a href='#'>$value</a></li>";
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <!-- <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div> -->

    </div>