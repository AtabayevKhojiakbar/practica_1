<?php
    require_once "connect.php";

    $id = $_GET['id'];
    $sql = "select * from tarix where id='$id';";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    $name = $rows['mahsulot_nomi'];
    $sum = $rows['narxi'];
    $son = $rows['soni'];
    $natija=false;
    if(isset($_POST['submit'])){
        $natija = true;
        $soni=$_POST['soni'];
        $t=$son-$soni;
        if($t>0) {
            $sql = "update tarix set soni='$t' where id='$id';";
            $rlt = mysqli_query($conn,$sql);
        }
        else{
            $sql = "delete from tarix where id='$id';";
            $rlt = mysqli_query($conn,$sql);
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

    <title>Sotish bo`limi</title>
</head>
<body>
<h1 class="text text-primary text-center">Mahsulot sotish</h1>
<a href="adminPanel.php" class="btn btn-primary">Mahsulotlar ro'yhatiga qaytish</a>
<div class="p-3" style="background-color: rgba(239,243,239,1.66); box-shadow: 0px 0px 15px 15px #c8c2ec; border-style: solid;border 30px; border-color:  #7009ef; border-radius: 20px; width: 400px; height: 430px; margin: 10px auto">
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color:#7009ef; font-weight: 700; font-size: 16px; " class="text-info">Mahsulot nomi: <?php echo $name;?></label>
        </div>
        <br>
        <div class="mb-3">
            <label for="exampleInputEmail1" style="color:#7009ef; font-weight: 700; font-size: 16px; "class="text-info">Mahsulot narxi: <?php echo $sum;?></label>
        </div>
        <br>
        <div class="mb-3">
            <label for="exampleInputPassword1" style="color:#7009ef; font-weight: 700; font-size: 16px; " class="text-info">Mashsulot sonini tanlang</label>
            <input type="number"  class="form-control" required name="soni" placeholder="max: <?php echo $son; ?>">
        </div>
        <br>
        <input type="submit" name="submit" style="font-weight: 700; font-size: 16px; " class="form-control btn btn-outline-success" value="sotish">
    </form>
    <br>
    <?php
    if($natija){
        ?>
        <h2 class="text text-success">Mahsulot sotildi!</h2>
        <?php
    }
    ?>

</div>
