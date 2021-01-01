<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="script" href="bootstrap-4.5.3/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main-ctg</title>
</head>
<body>
<?php
include 'connection.php';
include 'connection.php';

$parent_id = $cat_name ="";
$parent_iderror=$cat_nameerror="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!preg_match("/^[1-9 ][0-9]*$/",$_POST['parent_id'])) {
        $parent_iderror = "Only letters and white space allowed";
        if (!preg_match("/^[a-zA-Z-'1-9 ]*$/",$_POST['cat_name'])) {
            $cat_nameerror = "Only letters and white space allowed";
        }
    }

    else{


        $parent_id=$_POST['parent_id'];
        $cat_name=$_POST['cat_name'];
        $mysql = "INSERT INTO category(parent_id,cat_name) 
        VALUES ('$parent_id', '$cat_name')";
        $myresult=mysqli_query($conn,$mysql);
        if($myresult){
            $data = 'done';
        }
        else{
            $data = 'not';
        }
    }
}

?>
<div class="container-fluid">
    <div class="container">
        <header class="mb-5">

        </header>
    </div>
    <div class="container main-div jumbotron" >
        <div>
            <h1 class="text-center">
                INSERT DATA INTO DATABASE
            </h1>
        </div>

        <div>

            <div>
                <form action="" method="post">


                    <input type="text" placeholder="parent-id"  name="parent_id" class="w-100 m-2 form-control" >
                    <span class="text-danger">*<?php echo "$parent_iderror";?></span>
                    <input type="text" placeholder="category name" name="cat_name" class="w-100 m-2 form-control" required>
                    <span class="text-danger">*<?php echo "$cat_nameerror";?></span>

                    <div class="text-center">
                        <input type="submit" name="submit" value="Enter" class="w-50">
                        <span class="red-field text-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>