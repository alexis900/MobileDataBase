<?php
include 'database.php';
$brand_id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM brand WHERE id=$brand_id";

if ($conn->query($sql) === TRUE) {
  //header('Location: /messages/branddeleted.php');
  header('Location: ./list_brand.php');
} else {
  echo 'ERROR!' . $conn->error;
}

$conn->close();
 ?>
