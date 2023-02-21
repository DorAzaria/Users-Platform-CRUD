<?php include 'connect.php';

  extract($_POST);

  if(isset($_POST['nameSend'])
  && isset($_POST['emailSend'])
  && isset($_POST['phoneSend'])
  && isset($_POST['locationSend'])) {
    $sql="INSERT INTO users (name, email, phone, location)
    VALUES ('$nameSend', '$emailSend', '$phoneSend', '$locationSend');";

    $result= mysqli_query($conn, $sql);
    
  }

?>
