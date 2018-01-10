<?php
// session_start();
$db['db_server'] = "localhost";
$db['db_username'] = "root";
$db['db_password'] = "";
$db['db_dbName'] = "cms";
// echo"DB INCLUDED";


// $_SESSION["login"] = false;
// $_SESSION["username"] = "abc";
// $_SESSION["role"] = "none";
// $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
//   $db['db_server'] = $url["host"];
//   $db['db_username'] = $url["user"];
//   $db['db_password'] = $url["pass"];

  $db['db_dbName'] = "cms";
foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

function myValidator($data){
    $res = htmlspecialchars($data);
    $res = stripslashes($res);
    return $res;
}

$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if($con->connect_error){
   // echo "Connection error<br>";
    // echo "<script>console.log('connected')</script>";
}
else{
    //echo "Connected <br>";
    // echo "<script>console.log('connected')</script>";
}

mysqli_select_db($con, DB_DBNAME );

// $sql = "USE " .DB_DBNAME;

// if($con->query($sql) == TRUE){
//     //echo "Database selected <br>";
// }
// else{
//     //echo "Database selection error";
// }



?>