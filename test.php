<?php
    require_once "connect.php";
    $sql="select sum(narxi) as narx from tarix";
    $result=mysqli_query($conn,$sql);
    var_dump($result);
    $m=(mysqli_fetch_assoc($result));
    echo $m['narx'];