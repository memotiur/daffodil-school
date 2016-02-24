<?php
include('mysql_connect.php');
//echo $_GET['id'];
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM contestant WHERE cid=$id";
    if(mysqli_query($conn,$sql))
    {
        echo "Item deleted";
        header('location:contestant.php');

    }
    else{
        echo "Item did not deleted".mysqli_error($conn);
        header('location:contestant.php');
    }

}

?>