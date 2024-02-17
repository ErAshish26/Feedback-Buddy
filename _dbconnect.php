<?php
$server="localhost";
$username="root";
$password="";
$database="ashish";

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo "Success";

}

?>