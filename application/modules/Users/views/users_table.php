<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
   
    <div class="card-body" id="table">
      <div class="row">
    <div class="col">
      <h4 class="card-title">All Users </h4>
    </div>
    <div class="col pull-right">
      <button class="pull-right btn btn-success" data-toggle="modal" data-target="#new_user" >New User
          <i class="mdi mdi-plus"></i>
      </button>      
    </div>
  </div>
      <!-- Card -->
      <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Status</th>
                <th>Date rgistered</th>
                <th>Last login</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          <!-- <pre>
          <?php var_dump($users); ?>
                  </pre> -->
          <?php foreach ($users as $user):?>
              <tr>
                  <td><?php echo $user->email;?></td>
                  <td><?php echo $user->first_name;?></td>
                  <td><?php echo $user->last_name;?></td>
                  <td><?php echo $user->active;?></td>
                  <td><?php echo date('Y-m-d H:i:s',$user->created_on);?></td>
                  <td><?php echo date('Y-m-d H:i:s',$user->last_login);?></td>
                  <td>
                    
                    <a href="<?php echo base_url('users/edit/'); ?><?php echo $user->id;?>" class="pull-right btn btn-success">
                      <i class="mdi mdi-pen"></i>Edit
                    </a>
                    <!-- <a class="pull-right btn btn-warning">
                      <i class="mdi mdi-account-key"></i>block
                    </a> -->
                  </td>
              </tr>
      <!-- <li></li> -->
        <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Status</th>
                <th>Date rgistered</th>
                <th>Last login</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    <!-- modal form  -->
<div class="modal fade" id="new_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          $attributes = array('class' => 'pt-5', 'id' => 'myform');
          echo form_open('users/new_user');
        ?>
          <div class="form-group">
            <label for="email" class="col-form-label">email:</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="first_name" class="col-form-label">First name:</label>
            <input type="text" class="form-control" id="first_name">
          </div>
          <div class="form-group">
            <label for="last_name" class="col-form-label">Last name:</label>
            <input type="text" class="form-control" id="last_name">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="passwordc" class="col-form-label">Confirm password :</label>
            <input type="password" class="form-control" id="passwordc">
          </div>
          <!-- <div class="form-group">
            <label for="admin" class="col-form-label">Administrator:</label>
            <input type="text" class="form-control" id="passwordc">
          </div> -->
          <div class="form-check form-check-flat">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input"> Administrator
            <i class="input-helper"></i></label>
          </div>

          <!-- <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" checked=""> Checked
            <i class="input-helper"></i></label>
          </div> -->

<!--           <div class="form-group">
  <label for="message-text" class="col-form-label">Message:</label>
  <textarea class="form-control" id="message-text"></textarea>
</div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- end modal form -->
      <!-- card end -->
    </div>
  </div>
</div>

