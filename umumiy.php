<?php
    require_once "connect.php";
    $sql = "select count(id) from tarix group by mahsulot_nomi;";
    $result = mysqli_query($conn,$sql);
    $n=$result->num_rows;


    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Umumiy ma`lumot</title>
</head>
<body>

    <h1 align="center" class="text text-info">Mahsulotlar</h1>
    <a href="adminPanel.php" class="btn btn-primary">Mahsulotlar ro'yhatiga qaytish</a>

<div class="container card">
    <table class="table table-bordered border-1">
        <tr>
            <th>Mahsulot turlari</th>
            <th>Umumiy mahsulotlar summasi</th>
        </tr>
        <?php
            $s=0;
            $bool = false;
            $sql = "select * from tarix;";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows>0) {
                $bool = true;
                while ($rows = mysqli_fetch_assoc($result)) {
                    $son = $rows['soni'];
                    $narx = $rows['narxi'];
                    $s+=$son*$narx;
                }
            }
            ?>
        <tr>
            <?php
                if($bool){
           ?>
           <td><?php echo $n;?></td>
           <td><?php echo $s;?></td>

        </tr>
        <?php
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

