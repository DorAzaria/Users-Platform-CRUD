<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Users Platform</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">


  </head>
  <body>

    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new user</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

              <div class="mb-3">
              <label for="completeName" class="form-label">Name</label>
              <input type="text" class="form-control" id="completeName" placeholder="Enter your name">
              </div>

              <div class="mb-3">
              <label for="completeEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="completeEmail" placeholder="Enter your email">
              </div>

              <div class="mb-3">
              <label for="completePhone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="completePhone" placeholder="Enter your phone number">
              </div>

              <div class="mb-3">
              <label for="completeLocation" class="form-label">Location</label>
              <input type="text" class="form-control" id="completeLocation" placeholder="Enter your location">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" onclick="addUser()">Submit</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>



    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update User Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

              <div class="mb-3">
              <label for="updateName" class="form-label">Name</label>
              <input type="text" class="form-control" id="updateName" placeholder="Enter your name">
              </div>

              <div class="mb-3">
              <label for="updateEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="updateEmail" placeholder="Enter your email">
              </div>

              <div class="mb-3">
              <label for="updatePhone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="updatePhone" placeholder="Enter your phone number">
              </div>

              <div class="mb-3">
              <label for="updateLocation" class="form-label">Location</label>
              <input type="text" class="form-control" id="updateLocation" placeholder="Enter your location">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" onclick="UpdateUserInfo()">Update</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <input  type="hidden" id="hiddendata">
          </div>
        </div>
      </div>
    </div>


    <div class="container my-3">
      <h1 class="text-center">Users Platform</h1>
      <p class="text-center">Using PHP, AJAX, MySQL, jQuery and Bootstrap</p>

      <div class="container" style="background-color: lightgray">
        <hr/>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#completeModal">
          Add new user
        </button>
        <hr/>
      </div>

      <div id="displayDataTable"></div>
    </div>



    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        displayData();
      });

      function displayData() {
        var displayData = "true";
        $.ajax({
          url: "display.php",
          type: 'post',
          data: {
            displaySend: displayData
          },
          success: function(data, status) {
            $('#displayDataTable').html(data);

          }
        });
      }


      function addUser() {
        var nameAdd = $('#completeName').val();
        var emailAdd = $('#completeEmail').val();
        var phoneAdd = $('#completePhone').val();
        var locationAdd = $('#completeLocation').val();

        $.ajax({
          url:"insert.php",
          type:'post',
          data: {
            nameSend: nameAdd,
            emailSend: emailAdd,
            phoneSend: phoneAdd,
            locationSend: locationAdd
          },
          success: function(data, status) {
            // function to display data
            // console.log(status);
            $('#completeModal').modal('hide');
            displayData();
          }
        });
      }

      function DeleteUser(id) {
        $.ajax({
          url: "delete.php",
          type: 'post',
          data: {
            deleteSend: id
          },
          success: function(data, status) {
            displayData();
          }
        });
      }

      function UpdateModal(id) {
        $('#hiddendata').val(id);

        $.post("update.php", {updateID:id}, function(data, status) {
          var userid = JSON.parse(data);
          $('#updateName').val(userid.name);
          $('#updateEmail').val(userid.email);
          $('#updatePhone').val(userid.phone);
          $('#updateLocation').val(userid.location);
        });

        $('#updateModal').modal("show");
      }

      function UpdateUserInfo() {
        var updateName = $('#updateName').val();
        var updateEmail = $('#updateEmail').val();
        var updatePhone = $('#updatePhone').val();
        var updateLocation = $('#updateLocation').val();
        var hiddendata = $('#hiddendata').val();
        
        $.post("update.php", {
          updateName:updateName,
          updateEmail:updateEmail,
          updatePhone:updatePhone,
          updateLocation:updateLocation,
          hiddendata:hiddendata
        }, function(data, status) {
          $('#updateModal').modal('hide');
          displayData();
        });
      }
    </script>
  </body>
</html>
