<?php
include 'index.php';
include 'connection.php';
$sql = "SELECT cat_name from category where parent_id=0 ";
$result = $conn->query($sql);
if(mysqli_num_rows($result) == 0) {
echo "There is nothing else to do! :)";}
///////////////////////////////////
$sql1 = "SELECT cat_name from category where parent_id > 0";
$result1 = $conn->query($sql1);
if(mysqli_num_rows($result1) == 0) {
    echo "There is nothing else to do! :)";}
?>

  <form action="index.php" method="post">
      <select name="category">
          <?php while ($row=mysqli_fetch_assoc($result)){
              ?>
              <optgroup label="<?php echo $row["cat_name"] ?>" >
                  <?php while ($row1=mysqli_fetch_assoc($result1)){?>
                  <option><?php echo $row1["cat_name"]?></option><?php } ?>
              </optgroup>
          <?php

              } ?>

      </select>
  </form>
