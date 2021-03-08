$(document).ready(function () {

  $('#loginForm').on('click','#register', function () {
    $('.modal-body, .changer')
      .html('loading...')
      .load('../App/View/login/tokenAuth.php', function(){
        //Bagian yang dilakukan sehabis load
        $('#f_identity').attr('role','reg');
      });
    $('#modal_title_changer').html('Register');
    $('#instruction_btn').html('Next');
    $('#modalInput').modal('toggle');
  });

  $('#loginForm').on('click','.forgotPass', function () {
    $('.modal-body, .changer')
      .html('loading...')
      .load('../App/View/login/tokenAuth.php', function(){
        //Bagian yang dilakukan sehabis load
        $('#f_identity').attr('role','reset');
      });
    $('#modal_title_changer').html('Forgot Password');
    $('#instruction_btn').html('Next');
    $('#modalInput').modal('toggle');
  });

})
