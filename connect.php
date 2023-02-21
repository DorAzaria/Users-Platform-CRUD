<?php

  $conn = new mysqli('localhost', 'root', '', 'usersplatform');

  if(!$conn) {
    die(mysqli_error($conn));
  }



?>
