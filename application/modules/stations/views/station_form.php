      
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><?php echo $card_title; ?></h4>
      <?php 
      // echo validation_errors('<p class="text-danger">','</p>'); 
      $attributes = array('class' => 'pt-5', 'id' => 'myform');
      ?>
      <?php echo form_open('users/new_user'/*, $attributes*/);?>
      <!-- <form class="form-sample"> -->
        <p class="card-description">
          Personal info
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="first_name">First Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="first_name" name="first_name">
              <?php echo form_error('first_name','<p class="text-danger">','</p>'); ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="last_name">Last Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="last_name" name="last_name">
              <?php echo form_error('last_name','<p class="text-danger">','</p>'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="password">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password">
              <?php echo form_error('password','<p class="text-danger">','</p>'); ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="passwordc">Confirm password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="passwordc" name="passwordc">
              <?php echo form_error('passwordc','<p class="text-danger">','</p>'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row text-right">
                <label class="col-sm-9 col-form-label" for="admin">Administrator</label>
              <div class="form-check form-check-flat">
              <label class="form-check-label col-sm-3" for="admin">
                <!-- <div class="col-sm-6">Administrator -->
                <input type="checkbox" class="form-check-input" id="admin" name="admin"> <!-- Administrator -->
              <i class="input-helper"></i></label> </div>
            <!-- </div> -->
            </div>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success mr-2">Submit</button>
          </div>
        </div>
        
        
        
      </form>
    </div>
  </div>
</div>