<!-- Modal -->


<div class="modal fade" id="UpdateModalpass" tabindex="-1" aria-labelledby="UpdateModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateModalLabel">Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <button href="#profile" class="list-group-item list-group-item-action active" data-bs-target="#UpdateModalpass" data-bs-toggle="modal">Update profile</button>
              <button href="#password" class="btn btn-primary list-group-item list-group-item-action" data-bs-target="#UpdateModalprof" data-bs-toggle="modal">Update Password</button>
              <!-- <a href="" class="list-group-item list-group-item-action">Contact</a>
              <a href="" class="list-group-item list-group-item-action">About</a> -->
            </div>
          </div>
          <div class="col-md-9">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <input type="hidden" name="modalId" value="1"> <!-- Added this hidden input field -->
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $name; ?>" name="name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                <input type="number" minlength="10" maxlength="10" class="form-control" id="exampleFormControlInput1" name="mobile" value="<?php echo $mobile; ?>">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?php echo $email; ?>">
              </div>
              <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password"  class="form-control" name="password" id="inputPassword">
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="UpdateModalprof" tabindex="-1" aria-labelledby="UpdateModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <button href="#profile" class="list-group-item list-group-item-action" data-bs-target="#UpdateModalpass" data-bs-toggle="modal">Update profile</button>
              <button href="#password" class="btn btn-primary list-group-item list-group-item-action active" data-bs-target="#UpdateModalprof" data-bs-toggle="modal">Update Password</button>
              <!-- <a href="" class="list-group-item list-group-item-action">Contact</a>
              <a href="" class="list-group-item list-group-item-action">About</a> -->
            </div>
          </div>
          <div class="col-md-9">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <input type="hidden" name="modalId" value="2"> <!-- Added this hidden input field -->
              <div class="mb-3">
                <label for="inputPassword" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
              </div>
              <div class="mb-3">
                <label for="inputPassword" class="form-label"> New Password</label>
                <input  minlength="8"  type="password" class="form-control" id="inputPassword" name="newpassword">
              </div>
              <div class="mb-3">
                <label for="inputPassword" class="form-label"> Verify Password</label>
                <input  minlength="8" type="password" class="form-control" id="inputPassword" name = "verifypassword">
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>