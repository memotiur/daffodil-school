<?php
$serverName="localhost";
$password="";
$username="root";
$dbnNme="disquiz";
$sql="CREATE DATABASE IF NOT EXISTS $dbnNme";
$conn=mysqli_connect($serverName,$username,$password);
if(!mysqli_query($conn,$sql)){
    echo("Database Not Created".mysqli_error($conn)."<br>");
}//echo"Created";

$conn=mysqli_connect($serverName,$username,$password,$dbnNme);
if(!mysqli_query($conn,$sql)){
    echo("Database Not Connected");
}
//echo'Connected';
?>