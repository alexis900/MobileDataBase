<!DOCTYPE html>
<html>
  <head>
    <?php include './include/header.php'; ?>
    <title></title>
  </head>
  <body>
  <?php include './include/nav.php';
  include './include/database.php';
  $id = $_GET['id'];

/* stackoverflow user: https://stackoverflow.com/users/493122/shoe */
  $query = "SELECT * FROM brand WHERE id ='$id'";
   if ($result=mysqli_query($conn,$query))
    {
     if(mysqli_num_rows($result) > 0)
      {
        echo "Exists";
      }
    else
        Header('Location: ./errors/404.php');
    }
  else
        Header('Location: ./errors/500.php');

$conn->close();
  ?>
  </body>
</html>
