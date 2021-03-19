$(document).ready(function () {

  $('#loginForm').on('click','#register', function () {
    $('.modal-body, .changer')
      .html('loading...')
      .load(APP_url+'/App/View/login/tokenAuth.php', function(){
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
      .load(APP_url+'/App/View/login/tokenAuth.php', function(){
        //Bagian yang dilakukan sehabis load
        $('#f_identity').attr('role','reset');
      });
    $('#modal_title_changer').html('Forgot Password');
    $('#instruction_btn').html('Next');
    $('#modalInput').modal('toggle');
  });
});

function confirmPass() {
  if ($('#m_pass').val() != null && $('#m_pass').val() != ''){
      $('#c_pass').prop("disabled",false);
    if ($('#m_pass').val() == $('#c_pass').val()) {
      $('#c_msg').html('Matching').css('color', 'green');
      $('#instruction_btn').prop("disabled", false);
    } else{
      $('#c_msg').html('Not Matching').css('color', 'red');
      $('#instruction_btn').prop("disabled", true);
    }
  }
}
