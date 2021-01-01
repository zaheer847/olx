<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OLX</title>
    <link rel="stylesheet" href="bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="script" href="bootstrap-4.5.3/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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
            <ul class="list-group list-group-horizontal" name="category">
                <li class="list-group-item"><a href="#">Mobile Phone</a></li>
                <li class="list-group-item"><a href="#">Cars</a></li>
                <li class="list-group-item"><a href="#">Motorcycles</a></li>
                <li class="list-group-item"><a href="#">Houses</a></li>
                <li class="list-group-item"><a href="#">TV-Video-Audio</a></li>
                <li class="list-group-item"><a href="#">Tablets</a></li>
                <li class="list-group-item"><a href="#">Land & Plots</a></li>

            </ul>


        </div>
    </div>
    <div class="row w-100 pl-5">
        <div class="col">
            <?php
            $sql_cat= "SELECT cat_name,cat_id from category Where parent_id= 0 ";
            $result_cat=mysqli_query($conn,$sql_cat);?>
            <ul class="list-group list-group-horizontal" name="category">
                <?php while ($row_cat=mysqli_fetch_assoc($result_cat)){
                    ?>
                    <li class="list-group-item col-lg-1"><?php echo $row_cat['cat_name']; ?></li>
                    <?php
                    $sql_subcat= "SELECT cat_name from category Where parent_id =".$row_cat['cat_id'];
                    $result_subcat=mysqli_query($conn,$sql_subcat);
                    while ($row_subcat=mysqli_fetch_assoc($result_subcat)){
                        echo $row_subcat['cat_name'].'<br>';
                    }

                } ?>

        </div><?php
        $sql_cat= "SELECT cat_name,cat_id from category Where parent_id= 0 ";
        $result_cat=mysqli_query($conn,$sql_cat);?>
        <select>
            <?php while ($row_cat=mysqli_fetch_assoc($result_cat)){
            ?>
            <option>
                <?php echo $row_cat['cat_name']; ?><?php
                $sql_subcat= "SELECT cat_name from category Where parent_id =".$row_cat['cat_id'];
                $result_subcat=mysqli_query($conn,$sql_subcat);
                while ($row_subcat=mysqli_fetch_assoc($result_subcat)){
                    echo $row_subcat['cat_name'].'<br>';
                }

                } ?>
            </option>

        </select>

    </div>
</div>
</body>
</html>
