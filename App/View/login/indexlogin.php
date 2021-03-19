<div class="holder">
  <div class="notif-response <?php if(isset($data->error))echo 'error';?>">
    <span class="auth-response"><?php if(isset($data->error)) echo $data->error; ?></span>
  </div>
  <div class="login-container">
    <div class="header">
      <span>login</span>
    </div>
    <div class="body">
      <form id="loginForm" action="<?=loginfirst?>/auth" method="post">
        <div class="input_group">
          <span>username</span>
          <input type="text" name="username" required="true" aria-hidden="true" value="<?php if(isset($data->old))echo $data->old; ?>">
        </div>
        <div class="input_group">
          <span>password</span>
          <input type="password" name="password">
        </div>
        <div class="optionBlock">
          <a class="forgotPass" aria-hidden="true">lupa ?</a>
          <button  class="btn btn-success" type="submit" name="login">login</button>
          <span id="register" class="btn btn-info">Register</span>
        </div>
      </form>
    </div>
    <div class="footer">
      don't forget to give a time for your future
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalRegistTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title_changer"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body changer"></div>
      <div class="modal-footer">
        <button id="instruction_btn" type="button" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?=baseaset?>/js/auth.js"></script>
<script>
  $(document).ready(function () {
    $('.modal-footer').on('click', '#instruction_btn', function () {
      var role = $('#f_identity').attr('role');
      token = $('#token_wrapper [type=text]').val();

      if (token == '') {
        $('#token_wrapper [type=text]').toggleClass('alert');
        setTimeout(function(){
          $('#token_wrapper [type=text]').toggleClass('alert');
        },1000);
      }

      if (role == 'reg' && token != '') {
        $.ajax({
          method: "post",
          url: "<?=baseurl?>/ajax/auth",
          data: {token:token,role:role},
          cache: false,
          type: "json",
          success: function(data){
            if (data.success == 1) {
              $('.modal-body, .changer')
                .html('loading...')
                .load(data.dom);
              $('#instruction_btn').html('Register');
            }else{
              $('#token_wrapper [type=text]').toggleClass('alert');
              setTimeout(function(){
                $('#token_wrapper [type=text]').toggleClass('alert');
              },1000);
              $('#token_wrapper .msg').addClass('alert');
            }
          },
          error: function (data){
            alert('response auth failed');
          }
        });

      }else if (role == 'register'){
        form = $('#register_sc');
        form.validate();

        if (form.valid()) {

          data = form.serialize();
          console.log(data);
          $.ajax({
            method: "post",
            url: "<?=baseurl?>/ajax/registrasi",
            data: data,
            cache: false,
            type: 'json',
            success: function(data){
              if (data.success == 2) {
                alert('Terjadi Keselahan atau User Sudah Ada!');
              }else if (data.success == 0){
                alert(data.success);
              }else{
                alert(data.success);
                location.reload();
              }
            },
            error: function(data){
              alert('response register failed');
            }
          });

        }

      }else if (role == 'reset' && token != ''){

        $.ajax({
          method: "post",
          url: "<?=baseurl?>/ajax/auth",
          data: {token:token,role:role},
          cache: false,
          type: "json",
          success: function(data){
            if (data.success == 1) {
              $('.modal-body, .changer')
                .html('loading...')
                .load(data.dom);
              $('#instruction_btn').html('Reset');
            }else{
              $('#token_wrapper [type=text]').toggleClass('alert');
              setTimeout(function(){
                $('#token_wrapper [type=text]').toggleClass('alert');
              },1000);
              $('#token_wrapper .msg').addClass('alert');
            }
          },
          error: function (data){
            alert('ajax response auth failed');
          }
        });

      }else{

      }
    });
  });
  function formCheck(form_s) {
    return form_s.validate();
  }
</script>
