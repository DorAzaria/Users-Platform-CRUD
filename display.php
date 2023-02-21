<?php include 'connect.php';

  if(isset($_POST['displaySend'])) {
    $table = '<table class="table my-3">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Location</th>
        <th scope="col"></th>
      </tr>
    </thead>';

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $row_number = 1;
    while($row=mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $email = $row['email'];
      $phone = $row['phone'];
      $location = $row['location'];

      $table.='<tr>
        <td scope="row">'.$row_number.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$phone.'</td>
        <td>'.$location.'</td>
        <td>
          <button class="btn btn-dark" onclick="UpdateModal('.$id.')">Update</button>
          <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
        </td>
      </tr>';

      $row_number++;
    }
    $table.='</table>';
    echo $table;
  }

?>
