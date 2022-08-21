<?php
    require_once "connect.php";
    $users = "users";
    $password = "123456";
    if(isset($_POST['submit'])){
        if($_POST['username']==$users and $_POST['password']==$password){

        }
        else{
            header("location: register.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Admin Panel</title>
</head>
<body>
<div class="card">
    <h1 align="center" class="text text-primary">Mahsulotlar ombori</h1>
</div>
<div class="container card">
<!--    <div class="d-flex justify-content-end"></div>-->
    <div class="d-flex justify-content-end"><a href="umumiy.php" style="margin-right: 5px" class="btn btn-success">Umumiy ma`lumot</a><a href="mahsulot.php" class="btn btn-success">Mahsulot Qo`shish</a></div>
    <table class="table table-bordered border-1">
        <tr>
            <th >#</th>
            <th>Mahsulot nomi</th>
            <th>Soni</th>
            <th>Narxi</th>
            <th>Sana</th>
            <th>Amal</th>
        </tr>
        <?php
            $sql = "select * from tarix;";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows>0){
                while ($rows = mysqli_fetch_assoc($result)){
                ?>
        <tr>
           <td><?php $idd=$rows['id']; echo $rows['id']; ?></td>
           <td><?php echo $rows['mahsulot_nomi'] ?></td>
           <td><?php echo $rows['soni'] ?></td>
           <td><?php echo $rows['narxi'] ?></td>
           <td><?php echo $rows['sana'] ?></td>
           <td>
               <a href="tahrirlash.php?id=<?php echo $idd;?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                   <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                   </svg></a>
               <a href="ochirish.php?id=<?php echo $idd;?>" class="btn   btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                       <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                   </svg></a>
               <a href="sotish.php?id=<?php echo $idd;?>" class="btn btn-success">Sotish</a>
           </td>
        </tr>
        <?php
                }
            }
            else{
                ?>
                <h4 class="text text-danger">Hozircha Omborda mahsulot yo`q</h4>
        <?php
            }
        ?>
    </table>
</div>
</body>
</html>
