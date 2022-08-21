<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "ombor";

    $conn = mysqli_connect("$servername","$username","$password","$db");

    if(!$conn){
        die("Xatolik: ".mysqli_connect_error());
    }