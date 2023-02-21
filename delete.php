<?php include 'connect.php';

  if(isset($_POST['deleteSend'])) {
    $unique=$_POST['deleteSend'];
    $sql = "DELETE FROM users WHERE id=$unique";
    $result = mysqli_query($conn, $sql);
  }
?>
