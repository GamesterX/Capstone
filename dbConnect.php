<!-- file: dbconnect
 by: Ray Jaconski
date: 7/12/21
class: INTRO TO WEB DEVELOPMENT - 1
 purpose: <Description of the Class -->
<?php
require_once('credentials.php');

function db_connect(){
    $conn = mysqli_connect(host, username, password, database, 3306);
    return $conn;
};

function db_close($conn){
if (isset($conn)){
  return  mysqli_close($conn);
}
}
?>