<?php
    require_once "connect.php";
    $id=$_GET['id'];
    $sql="delete from tarix where id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result) {
        header("location: adminPanel.php");
    }
    else{
        echo mysqli_error();
    }

?>

