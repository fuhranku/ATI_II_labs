$(document).ready( function() {
    $('#successmodal').delay(3000).fadeOut();
  });

  //delete user login
$('body').on('click', '.delete-btn', function () {
  var user_id = $(this).data("id");
  var token = $(this).data("token");

  console.log("user id: " + user_id);
  console.log("user token: " + token);

  confirm("Are You sure want to delete !");

  $.ajax({
      type: "DELETE",
      url: "delete/" + user_id,
      data:{"id": user_id,
            "_token": token},
      success: function (data) {
          console.log("probando");
          $("#user-id-" + user_id).remove();
      },
      error: function (data) {
          console.log('Error:', data);
      }
  });
});

$('body').on('click', '.edit-btn', function () {

  $("#modal-bg").css('display', 'block');
  $("#myModal").css('display','block');
  var user = $(this).data("id");
  var token = $(this).data("token");

  // Fill form with user data
  $("#upt-name").attr("value", user.Nombre);
  $("#upt-lastName").attr("value", user.Apellido);
  $("#upt-email").attr("value", user.Email);
  $("#upt-id").attr("value", user.Cedula);
  $("#upt-gender").val(user.Genero);
  $("#upt-user_id").val(user.id);
});

/*

$("body").click(function() {

  if($('#myModal').css('display') == 'block'){
        
    console.log( $('#myModal').css('display') );
    console.log("arre loco ");

      $("#myModal").css('display','none');
      $("#modal-bg").css('display', 'none');

      console.log( $('#myModal').css('display') );
     
  }
});
*/


$('body').on('click', '.close', function () {
  $("#myModal").css('display','none');
  $("#modal-bg").css('display', 'none');
});  
