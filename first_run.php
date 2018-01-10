<?php 
$server = "localhost";
$username  = "root";
$password = "";
//   $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
//   $server = $url["host"];
//   $username = $url["user"];
//   $password = $url["pass"];
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
    echo "Database selected <hr>";
}
else{
    echo "Database selection error<hr>";
}

$sql = "CREATE table categories (
    cat_id INT(3) primary key AUTO_INCREMENT,
    cat_title varchar(255) NOT NULL
)";

if($con->query($sql) == TRUE){
    echo "category table created<hr>";
}
else{
    echo "category table creation failed<hr>";
}

// $sql = "INSERT INTO categories (cat_id, cat_title) VALUES (NULL, 'Javascript'), (NULL, 'Php'), (NULL, 'Bootstrap'), (NULL, 'NodeJs')";
// if($con->query($sql) == TRUE){
//     echo "category data inserted<hr>";
// }
// else{
//     echo "category data insertion failed<hr>";
// }

//----------------

$sql = "CREATE table posts (
    post_id INT(3) primary key AUTO_INCREMENT,
    post_cat_id INT(3),
    post_title varchar(255),
    post_author varchar(255),
    post_date date,
    post_image text,
    post_text text,
    post_tags varchar(255) NOT NULL,
    post_comment_count int(11),
    post_status varchar(255) DEFAULT 'draft',
    post_views_count int(11),
    FOREIGN KEY (post_cat_id) REFERENCES categories(cat_id)
)";

if($con->query($sql) == TRUE){
    echo "post table created<hr>";
}
else{
    echo "post table creation failed<hr>";
}

// $sql = "INSERT INTO categories (cat_id, cat_title) VALUES (NULL, 'Javascript'), (NULL, 'Php'), (NULL, 'Bootstrap'), (NULL, 'NodeJs')";
// if($con->query($sql) == TRUE){
//     echo "category data inserted";
// }
// else{
//     echo "category data insertion failed";
// }

$sql = "CREATE TABLE comments (
    comment_id int(3) primary key AUTO_INCREMENT,
    comment_post_id int(3),
    comment_author varchar(255),
    comment_email varchar(255),
    comment_text text,
    comment_date date,
    comment_status varchar(255) default 'inactive',
    foreign key (comment_post_id) references posts(post_id)
)";

if($con->query($sql) == TRUE){
    echo "comment table created<hr>";
}
else{
    echo "comment table creation failed<hr>";
}

$sql = "CREATE TABLE users (
    user_id int(3) primary key AUTO_INCREMENT,
    user_username varchar(255),
    user_firstname varchar(255),
    user_lastname varchar(255),
    user_email varchar(255),
    user_image text,
    user_role varchar(255) default 'user',
    user_password varchar(255),
    randSalt varchar(255)

)";

if($con->query($sql) == TRUE){
    echo "user table created<hr>";
}
else{
    echo "user table creation failed<hr>";
}

$sql = "CREATE TABLE polls(
    poll_id int(3) primary key AUTO_INCREMENT,
    poll_post_id int(3),
    poll_user_id int(3),
    poll_vote varchar(3),
    foreign key (poll_post_id) references posts(post_id),
    foreign key (poll_user_id) references users(user_id)
)";

if($con->query($sql) == TRUE){
    echo "poll table created<hr>";
}
else{
    echo "poll table creation failed<hr>";
}

?>