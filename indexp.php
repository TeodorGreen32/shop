<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="footer">
        
        <div>
            <a href="index.html">JS реализация</a>
            <a href="phptest/test.php">PHP Тесты</a>
        </div>
        
        
        
    </div>
    <div class="cfooter">
        <button><a href="indexp.php?sort=costup" class="btn">Цена по убыв.</a></button>
        <button><a href="cart.php">Корзина</a></button>
        <button><a href="indexp.php?sort=costdown" class="btn">Цена по возр.</a></button>
        
    </div>
    <div class="container">
        <div class="wrapper">
        <?php
            require('date.php');
            $arr = $goods;
            if($_GET['sort'] == "costup"){
                function sorting($x,$y){
                    
                    if($x['cost'] > $y['cost']) return -1;
                    elseif($x['cost'] < $y['cost']) return 1;
                    else return 0;
                }
                usort($arr, "sorting");
                for($i = 0; $i < count($arr);$i++){
                $arr[$i]['id'] = $i;
                
                $name = $arr[$i]["name"];
                $img = $arr[$i]["imgPath"];
                $cost = $arr[$i]["cost"];
                $idP = $arr[$i]['id'];
                echo "<div class='cards'>
                <p><a href='product.php?id=$idP'>$name</a></p>
                <img src='$img'>
                <p class='cost'>$cost руб</p>
                </div>";
            }
            $filename = "json.txt";
            $data = json_encode($arr);
            file_put_contents($filename,$data);
            }
            elseif($_GET['sort'] == "costdown"){
                function sorting($x,$y){
                    
                    if($x['cost'] < $y['cost']) return -1;
                    elseif($x['cost'] > $y['cost']) return 1;
                    else return 0;
                }
                usort($arr, "sorting");
                for($i = 0; $i < count($arr);$i++){
                $arr[$i]['id'] = $i;
                $name = $arr[$i]["name"];
                $img = $arr[$i]["imgPath"];
                $cost = $arr[$i]["cost"];
                $idP = $arr[$i]['id'];
                echo "<div class='cards'>
                <p><a href='product.php?id=$idP'>$name</a></p>
                <img src='$img'>
                <p class='cost'>$cost руб</p>
                </div>";
            }
            $filename = "json.txt";
            $data = json_encode($arr);
            file_put_contents($filename,$data);
            }
            elseif($_GET['sort'] == ''){
                for($i = 0; $i < count($arr);$i++){
                    $arr[$i]['id'] = $i;

                    $name = $arr[$i]["name"];
                    $img = $arr[$i]["imgPath"];
                    $cost = $arr[$i]["cost"];
                    $idP = $arr[$i]['id'];
                    echo "<div class='cards'>
                    <p><a href='product.php?id=$idP'>$name</a></p>
                    <img src='$img'>
                    <p class='cost'>$cost руб</p>
                    </div>";
            }
            $filename = "json.txt";
            $data = json_encode($arr);
            file_put_contents($filename,$data);
        }
            
        ?>
        </div>
        
    </div>
</body>
</html>