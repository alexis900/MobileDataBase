<!DOCTYPE html>
<html>

<head>
    <?php include './include/header.php';?>
    <title>List Brand</title>
</head>

<body>
    <?php include './include/nav.php';

include './include/database.php';


$sql = "SELECT * FROM brand";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
?>

  <?php
    echo "
    <div class='first_div_list_brand'>
      <div style='background:url(".$row['logo']."); background-repeat: no-repeat; background-size: 100%;' class='image_logo_brand'>
        <h2>" . $row['brand']."</h2>
        </div>
      <div>
        " . $row['description']. "
      </div>
      <div>
        <a href='./ibrand.php?id=" . $row['id'] . "'>Read more</a>
        <a href='./dbrand.php?id=" . $row['id']. "'>Delete</a>
      </div>
      </div>";
    }
  }else {
    echo "0 results";
  }

  $conn->close();
?>
</body>

</html>
