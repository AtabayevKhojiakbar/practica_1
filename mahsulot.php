<?php
require_once "connect.php";

$natija=false;
if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $son=$_POST['soni'];
    $narxi=$_POST['narxi'];
    $sql="select * from tarix where mahsulot_nomi='$name' and narxi='$narxi';";
    $result=mysqli_query($conn,$sql);
    if ($result->num_rows>0){
        $rows=mysqli_fetch_assoc($result);
        $dat=$rows['soni'];
        $id=$rows['id'];
        $sql="update tarix set soni=$dat+$son where id=$id";
        $natija=mysqli_query($conn,$sql);
    }
    else{
        $sql="insert into tarix(mahsulot_nomi, soni, narxi) values ('$name', $son, $narxi)";
        $natija=mysqli_query($conn,$sql);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<h1 class="text text-primary text-center">Mahsulot qo'shish</h1>
<a href="adminPanel.php" class="btn btn-primary">Mahsulotlar ro'yhatiga qaytish</a>
<div class="p-3" style="background-color: rgba(239,243,239,0.66); box-shadow: 0px 0px 20px 20px #c8c2ec; border-style: solid;border 30px; border-color:  #7009ef; border-radius: 20px; width: 400px; height: 530px; margin: 10px auto">
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color:#7009ef; font-weight: 700; font-size: 16px; " class="form-label">Mahsulot nomi</label>
            <input type="text" class="form-control"  required name="name" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color:#7009ef; font-weight: 700; font-size: 16px; "class="form-label">Mahsulot soni</label>
            <input type="number" class="form-control" required name="soni">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" style="color:#7009ef; font-weight: 700; font-size: 16px; " class="form-label">Mashsulot summasi</label>
            <input type="number"  class="form-control" required name="narxi">
        </div>
                <br>
        <input type="submit" name="submit" style="font-weight: 700; font-size: 16px; " class="form-control btn btn-outline-success" value="Qo'shish">
    </form>
    <br>
    <?php
        if($natija){
            ?>
            <h2 class="text text-success">Mahsulot omborga qo`shildi!</h2>
            <?php
        }
    ?>

</div>
