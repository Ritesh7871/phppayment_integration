<?php 
$servername="localhost";
$username="root";
$password="";
$database="shopping";

$con=mysqli_connect($servername,$username,$password,$database);

if(!$con){
    die("could not connect to database".mysqli_connect_error());
}


?>