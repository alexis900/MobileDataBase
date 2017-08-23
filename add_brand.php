<!DOCTYPE html>
<html>
  <head>
    <?php include './include/header.php'; ?>
    <title>Add Brand</title>
  </head>
  <body>
    <?php include './include/nav.php'; ?>

    <main class="mdl-layout__content">
        <div class="page-content">
<?php
include './database.php';

if (isset($_FILES) & !empty($_FILES)) {
  $logo_name = $_FILES['logo']['name'];
  $logo_type = $_FILES['logo']['type'];
  $logo_tmp_name = $_FILES['logo']['tmp_name'];
  $logo_size = $_FILES['logo']['size'];
}
$location = "./logo_upload/";
$maxsize = 100000;
if (isset($logo_name) & !empty($logo_name)) {
  if ($logo_type == "image/jpeg" || "image/svg" || "image/png" && $logo_size <= $maxsize) {
    if (move_uploaded_file($logo_tmp_name, $location.$logo_name)) {
      echo "Upload success!";
    } else {
     echo "ERROR!";
    }
  } else {
    echo "File should be JPG, PNG or SVG image";
  }
}
if (isset($_POST['brand_submit'])) {
  $brand = $_POST['brand'];
  $description = $_POST['description'];

  $sql = "INSERT INTO brand (id, brand, description, logo) VALUES ('', '$brand', '$description', '$location$logo_name')";

  if ($conn->query($sql) === TRUE) {
    echo "The brand " . $brand . " has added";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Brand</title>
  </head>
  <body>
    <form class="" action="add_brand.php" method="post" enctype="multipart/form-data">
      <input type="text" name="brand" value="" placeholder="Name of the brand"><br>
      <textarea name="description" rows="8" cols="80" placeholder="Description"></textarea><br>
      <input type="file" name="logo" value=""><br>
      <input type="submit" name="brand_submit" value="Submit">
    </form>
    <main class="mdl-layout__content">
      <div class="page-content">
      </div>
    </main>
  </div>
</div>
  </body>
</html>
