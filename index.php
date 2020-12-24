<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OLX</title>
    <link rel="stylesheet" href="bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="script" href="bootstrap-4.5.3/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<?php
$host="localhost";
$user="root";
$password="8786";
$db="olx";
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo $result;
//$conn->close();
?>
</head>
<body>
<div class="container-fluid">
   <div class="row  pt-2 pl-5 pr-5">
<div class="col-lg-1 col-sm-1"><img src="img/olx-logo.png"></div>
<div class="col-lg-4 col-sm-4"><i class="fas fa-search"></i><input type="search" placeholder="Search city,area or locality" value="Pakistan"><select type="search" value="Pakistan">
        <option>Punjab</option>
        <option>Sindh</option>
        <option>KPK</option>
        <option>Balochistan</option>
    </select></div>
<div class="col-lg-5 col-sm-5"><input type="search" class="w-75" placeholder="Find, Cars, Mobile and mores..."><button><i class="fas fa-search"></i></button></div>
<div class="col-lg-1 col-sm-1"><a href="#"><b><u>Login</u></b></a></div>
<div class="col-lg-1 col-sm-1"><button class="bg-transparent border-0"><img src="img/sell-button.png"></button></div>
   </div>
    <div class="row w-100 pl-5">

        <div class="col-lg-12 col-sm-12">
<!--            <ul class="list-group list-group-horizontal">-->
<!--                <li class="list-group-item"> <select>-->
<!--                        <option>Cars</option>-->
<!--                        <option>Cars on installment</option>-->
<!--                        <option>Car accessries</option>-->
<!--                        <option>Car parts</option>-->
<!--                        <option>Other Vechiles</option>-->
<!--                        <option>Tractor</option>-->
<!--                    </select></li>-->
<!--                <li class="list-group-item"><a href="#">Mobile Phone</a></li>-->
<!--                <li class="list-group-item"><a href="#">Cars</a></li>-->
<!--                <li class="list-group-item"><a href="#">Motorcycles</a></li>-->
<!--                <li class="list-group-item"><a href="#">Houses</a></li>-->
<!--                <li class="list-group-item"><a href="#">TV-Video-Audio</a></li>-->
<!--                <li class="list-group-item"><a href="#">Tablets</a></li>-->
<!--                <li class="list-group-item"><a href="#">Land & Plots</a></li>-->
<!---->
<!--            </ul>-->
            <?php

            $sql = "SELECT category.cat_name,product.prod_name FROM category LEFT OUTER JOIN product ON category.cat_id = product.cat_id";
            $result = $conn->query($sql);
    if(mysqli_num_rows($result) == 0) {
        echo "There is nothing else to do! :)";
    }
    else{
        ?>
        <dl><?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <dt><?php echo $row["cat_name"] ?></dt>
                <dd><?php echo $row["prod_name"] ?></dd><?php
            }?>
        </dl>
<?php
            }?>

        </div>
    </div>
</div>
</body>
</html>
