<?php
    require_once "connect.php";
    $id=$_GET['id'];
    $natija=false;
    if(isset($_POST['submit'])){
        $narx=$_POST['narxi'];
        $sql="update tarix set narxi='$narx' where id='$id';";
        $result=mysqli_query($conn,$sql);
        if($result) $natija=true;
    }

    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Tahrirlash</title>
</head>
<body>
<h1 class="text text-primary text-center">Mahsulot narxini o`zgartirish</h1>
<a href="adminPanel.php" class="btn btn-success">Mahsulotlar ro'yhatiga qaytish</a>
<div class="p-3" style="background-color: rgba(239,243,239,0.66); box-shadow: 0px 0px 20px 20px #c8c2ec; border-style: solid;border 30px; border-color:  #7009ef; border-radius: 20px; width: 400px; height: 330px; margin: 10px auto">
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" style="color:#7009ef; font-weight: 700; font-size: 16px; " class="form-label">Mashsulot summasi</label>
            <input type="number"  class="form-control" required name="narxi">
        </div>
        <br>
        <input type="submit" name="submit" style="font-weight: 700; font-size: 16px; " class="form-control btn btn-outline-success" value="Qo'shish">
    </form>
    <?php
        if($natija){?>
    <h4 class="text text-success">Mahsulot narxi o`zgartirildi!</h4>
    <?php
        }
    ?>
</div>
</body>
</html>
