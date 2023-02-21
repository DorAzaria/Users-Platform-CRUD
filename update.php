<?php include 'connect.php';

if(isset($_POST['updateID'])) {
  $id = $_POST['updateID'];
  $sql = "SELECT * FROM users WHERE id = $id;";
  $result = mysqli_query($conn, $sql);
  $response = array();
  while($row=mysqli_fetch_assoc($result)) {
    $response=$row;
  }
  echo json_encode($response);
} else {
  $response['status'] = 200;
  $response['message'] = "Invalid or data not found";
}


// update query
if(isset($_POST['hiddendata'])) {
  $id = $_POST['hiddendata'];
  $name = $_POST['updateName'];
  $email = $_POST['updateEmail'];
  $phone = $_POST['updatePhone'];
  $location = $_POST['updateLocation'];

  $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', location = '$location' WHERE id = $id";
  $result = mysqli_query($conn, $sql);
}
?>
