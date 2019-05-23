<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
   
    <div class="card-body" id="table">
      <div class="row">
    <div class="col">
      <h4 class="card-title">All Users </h4>
    </div>
    <div class="col pull-right">
      <button class="pull-right btn btn-success" data-toggle="modal" data-target="#new_user" >New Station
          <i class="mdi mdi-plus"></i>
      </button>      
    </div>
  </div>
      <!-- Card -->
      <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>company</th>
                <th>Notes</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
          <!-- body -->
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>company</th>
                <th>Notes</th>
                <th>View</th>
            </tr>
        </tfoot>
    </table>
    <!-- modal form  -->
<div class="modal fade" id="new_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Station</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          $attributes = array('class' => 'pt-5', 'id' => 'myform');
          echo form_open('stations/new_station');
        ?>
          <div class="form-group">
            <label for="email" class="col-form-label">Station name:</label>
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
          <div class="form-check form-check-flat">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input"> Administrator
            <i class="input-helper"></i></label>
          </div>
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

