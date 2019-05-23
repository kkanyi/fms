<h2>Login</h2>
<h4 class="font-weight-light">Hello! let's get started</h4>
<!-- <form class="pt-5"> -->
  <?php echo validation_errors('<p class="text-danger">','</p>'); ?>
  <!-- <p class="text-danger">testing ...</p> -->
  <!-- <form method="post" class="pt-5" action="<?php echo base_url('secure/login'); ?>"> -->
    <?php 
      $attributes = array('class' => 'pt-5', 'id' => 'myform');
      echo form_open('secure/login'/*, $attributes*/);
    ?>
    <!-- <form> -->
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input  class="form-control" id="email" name="email" placeholder="Email">
      <!-- type="email" -->
      <!-- aria-describedby="emailHelp" -->
      <i class="mdi mdi-account"></i>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <i class="mdi mdi-eye"></i>
    </div>
    <div class="form-group">
      <div class="form-check pull-left">
        <label class="form-check-label">
          <input type="checkbox" class="" id="remember" name="remember" value="1">
          Remember me
        <i class="input-helper"></i></label>
      </div>
    </div>
    <div class="form-group">
    <div class="mt-5">
      <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium">Submit</button>
      <!-- <a class="" href="<?php echo base_url('secure'); ?>">Login</a> -->
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="auth-link text-white">Forgot password?</a>
    </div>
  </form>                  
<!-- </form> -->