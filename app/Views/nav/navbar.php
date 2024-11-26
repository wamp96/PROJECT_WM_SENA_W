<?php
$session = session();
$getUser = $session->get(LOGGED_USER);
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #0e223e; min-height: 70px;">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">WM INVENTORY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= isset($profile['Profile_photo']) ? $profile['Profile_photo'] : '' ?>" class="rounded-circle" width="30px" height="30px" alt="Profile">
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="profileDropdown">
            <li>
              <a class="dropdown-item" href="#"><i class="bi bi-person"></i> <?= isset($profile['Profile_name']) ? $profile['Profile_name'] : '' ?></a>
            </li>
            <li>
              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#my-profile"><i class="bi bi-person-lines-fill"></i> Profile</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item text-danger" href="#" onclick="signOff()"><i class="bi bi-box-arrow-left"></i> Sign off</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="modal fade" id="my-profile" tabindex="-1" aria-labelledby="my-modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modalLabel">PROFILE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--Form-->
        <form id="my-modal_profile" class="">
          <input type="hidden" class="form-control" id="Profile_id" name="Profile_id" value=null>
          <input type="hidden" class="form-control" id="User_id_fk" name="User_id_fk" value=null>
          <input type="hidden" class="form-control" id="update_at" name="update_at" value=null>
          <div class="form-floating mb-3">
            <img src="<?= isset($profile['Profile_photo']) ? $profile['Profile_photo'] : '' ?>" class="img-thumbnail w-100 rounded-circle" alt="...">
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control " id="Profile_photo" name="Profile_photo" placeholder="Photo" value="<?= isset($profile['Profile_photo']) ? $profile['Profile_photo'] : '' ?>" required>
            <label for="Profile_photo">Photo </label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control " id="Profile_email" name="Profile_email" placeholder="Email Address" value="<?= isset($profile['Profile_email']) ? $profile['Profile_email'] : '' ?>" required>
            <label for="Profile_email">Email Address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control " id="Profile_name" name="Profile_name" placeholder="Name" value="<?= isset($profile['Profile_name']) ? $profile['Profile_name'] : '' ?>" required>
            <label for="Profile_name">Name </label>
          </div>
        </form>
        <!--End Form-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="my-form" id="btnSubmit" class="btn btn-primary">Send Data</button>
      </div>
    </div>
  </div>
</div>