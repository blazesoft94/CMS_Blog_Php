<?php 
// $server = "localhost";
// $username  = "root";
// $password = "";
  $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
$dbName = "cms";
$con = "";
$con = new mysqli($server, $username, $password);
if($con->connect_error){
    echo "connection error! <br>";
}

// $sql = "CREATE DATABASE " .$dbName;
// if($con->query($sql) == TRUE){
//     echo "Database created <br>";
// }
// else{
//     echo "Database creation error";
// }

$sql = "USE " .$dbName;
if($con->query($sql) == TRUE){
    echo "Database selected <br>";
}
else{
    echo "Database selection error";
}

// $sql = "CREATE table categories (
//     cat_id INT(3) primary key AUTO_INCREMENT,
//     cat_title varchar(255) NOT NULL
// )";

// if($con->query($sql) == TRUE){
//     echo "category table created";
// }
// else{
//     echo "category table creation failed";
// }

// $sql = "INSERT INTO categories (cat_id, cat_title) VALUES (NULL, 'Javascript'), (NULL, 'Php'), (NULL, 'Bootstrap'), (NULL, 'NodeJs')";
// if($con->query($sql) == TRUE){
//     echo "category data inserted";
// }
// else{
//     echo "category data insertion failed";
// }

//----------------

// $sql = "CREATE table posts (
//     post_id INT(3) primary key AUTO_INCREMENT,
//     post_cat_id INT(3),
//     post_title varchar(255),
//     post_author varchar(255),
//     post_date date,
//     post_image text,
//     post_text text,
//     post_tags varchar(255) NOT NULL,
//     post_comment_count int(11),
//     post_status varchar(255) NOT NULL DEFAULT 'draft',
//     post_views_count int(11) NOT NULL,
//     FOREIGN KEY (post_cat_id) REFERENCES categories(cat_id)
// )";

// if($con->query($sql) == TRUE){
//     echo "post table created";
// }
// else{
//     echo "post table creation failed";
// }

// $sql = "INSERT INTO categories (cat_id, cat_title) VALUES (NULL, 'Javascript'), (NULL, 'Php'), (NULL, 'Bootstrap'), (NULL, 'NodeJs')";
// if($con->query($sql) == TRUE){
//     echo "category data inserted";
// }
// else{
//     echo "category data insertion failed";
// }





?>