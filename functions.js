
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
      displayData();
    }
  });
}
