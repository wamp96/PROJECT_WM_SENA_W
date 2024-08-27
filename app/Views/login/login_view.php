<!DOCTYPE html>
<html lang="en">
<<<<<<< Updated upstream
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <?php require_once('../app/Views/assets/css/css.php');?>    
    <!--Title-->
    <title><?= $title ?></title>
</head>
<body>
    <?php require_once('../app/Views/preload/preload.php');?>
    <style>
         body, html {
            height: 100%;
        }
        .card{
            margin-top: 10%;
        }
    </style>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-6 mt-5 mx-auto">
                <div class="card">
                    <h1 class="card-title text-center"><?=$title?></h1>
                    <img src="../assets/img/logos/logo.png" class="card-img-top w-25 mx-auto" alt="...">
                    <div class="card-body">
                        <?php require_once('../app/Views/login/form.php');?>
                    </div>
                </div>        
                <a href="#" class="text-info" onclick="showForget()">Forgot Password</a>
            </div>
        </div>
    </div>
    <?php require_once('../app/Views/footer/footer.php');?>

    <div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="my-modalLabel" aria-hideen="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modalLabel"><?= $title?></h5>                
                    <button type="buttton" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modalbody">
                <?php require_once('../app/Views/login/forgetPassword.php');?>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="my-form" id="btnSubmit" class="btn btn-primary">Send Data</button>
            </div>
        </div>
    </div>
    <?php require_once('../app/Views/assets/js/js.php')?>
    <script src="../controllers/login/login.js"></script>
</body>
=======

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--CSS-->
  <?php require_once('../app/Views/assets/css/css.php') ?>
  <!--Title-->
  <style>
       
        .bg{
            background-image: url(../assets/img/logos/6491962.jpg);
            background-position: center center;
            background-size: cover; 

        }

        .btn{
            background: #102C57;
            background: linear-gradient(to right, #402E7A, #102C57);
        }
    </style>
  <title><?= $title ?></title>
</head>

<body>
  <!--Preload -->
  <?php require_once('../app/Views/preload/preload.php') ?>
  <!--End Preload -->
  <!--Container-->
  <div class="container w-75 mt-5 rounded shadow">
    <div class="row align-items-stretch">
      <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
            
      </div>
      <div class="col bg-white p-5 rounded-end">
          <div class="text-end">
            <img src="../assets/img/logos/logo.png" width="58" alt="logo">
          </div>
            <h2 class="fw-bold text-center py-5">Welcome</h2>
            <?php require_once('../app/Views/login/form.php') ?>
        <a href="#" class="text-info " onclick="showForget()">Forgot password</a>
      </div>

    </div>
  </div>
  <!--End Container-->
  
  <!--Modal-->
  <div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="my-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modalLabel"><?= $title ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--Form-->
          <?php require_once('../app/Views/login/forgetPassword.php') ?>
          <!--End Form-->
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="my-form" id="btnSubmit" class="btn btn-primary">Send Data</button>
        </div>

      </div>
    </div>
  </div>
  <!--End Modal-->

  <!--JS-->
  <?php require_once('../app/Views/assets/js/js.php') ?>
  <!--JS Controller-->
  <script src="../controllers/login/login.js"></script>
</body>

>>>>>>> Stashed changes
</html>