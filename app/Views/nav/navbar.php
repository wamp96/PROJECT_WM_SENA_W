<?php
$session = session();
$getUser = $session->get(LOGGED_USER);
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #0e223e; min-height: 70px;">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">WM INVENTORY</a>
    <a type="button" class="btn btn-danger" onclick="signOff()">SignOff</a>
  </div>
</nav>
