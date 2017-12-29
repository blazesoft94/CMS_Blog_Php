<?php
echo "-----------INCLUDED------------";

function addCategory(){
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
}

function editCategory(){
    if(isset($_POST["edit_title"])){
        $cat_title = $_POST["cat_title"];
        $cat_id = $_POST["cat_id"];
        $sql = "UPDATE categories set cat_title = '{$cat_title}' WHERE cat_id = $cat_id";
        $con->query($sql);
    }
}

function deleteCategory(){
    if(isset($_GET['delete'])){
        $cat_id = $_GET['delete'];
        $sql = "DELETE FROM categories WHERE cat_id = {$cat_id}";
        $con->query($sql);
        header("Location: categories.php");
    }
}

function displayCategory(){
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
}

?>