    <div id="reg_wrapper">
      <form id="register_sc">
        <input id="f_identity" type="hidden" name="identity" role="register">
        <div class="input_group">
          <span>username</span>
          <input type="text" name="un" id="un" required="true" class="required">
          <label for="un" class="error"></label>
        </div>
        <div class="input_group">
          <span>password</span>
          <input id="m_pass" type="password" name="m_pass" required="true" onkeyup="confirmPass();" class="required">
          <label for="m_pass" class="error"></label>
        </div>
        <div class="input_group">
          <span>confirm password</span>
          <input id="c_pass" type="password" name="c_pass" required="true" onkeyup="confirmPass();" class="required" disabled="true">
          <label for="c_pass" class="error"></label>
          <label id="c_msg" class="message"></label>
        </div>
    </div>
