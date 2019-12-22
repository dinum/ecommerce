<section class="post-area section-gap">
<div class="loginform section-top-border">
<?php $attributes = array('class' => 'form-group', 'id' => 'signinform');
echo form_open(base_url().'login/submit', $attributes); ?>
  <h3 class="mb-30">Please Login</h3>
  <?php echo (isset($msg)&&!empty($msg))?$msg:'';  ?>
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <?php echo form_input('uname','', 'required class="single-input" id="inputEmail" placeholder="User Name"'); ?>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <?php echo form_password('psword','', 'required class="single-input" id="inputPassword" placeholder="Password"'); ?>
  </div>
    <br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submitButton">Sign in</button>
  <a class="btn btn-block btn-secondary btn-small" href="<?php echo base_url(); ?>">Cancel</a>
<?php echo form_close(); ?>
</div>   
</section>    




