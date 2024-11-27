<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--CSS-->
  <?php require_once('../app/Views/assets/css/css.php') ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <!--Title-->
  <title><?= $title ?></title>



</head>

<body>
  <!--Preload -->
  <?php require_once('../app/Views/preload/preload.php') ?>
  <!--End Preload -->
  <?php require_once('../app/Views/nav/navbar.php') ?>
  <!--Container-->
  
    <div class="wrapper">
      <?php require_once('../app/Views/navSlider/navSlider.php') ?>
      <div class="main body2">
        <h3 class="title"><?= $title ?></h3>
        <div class="row g-4"> <!-- Gaps entre las columnas -->
          <?php for ($j = 0; $j < count($userModules); $j++): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
              <div class="card text-white mb-3"
                style="background-color: #fff5; backdrop-filter: blur(7px); text-align: center; width: 100%; max-width: 18em; padding: 10px;">
                <i class="bi bi-dashboard <?= $userModules[$j]['Modules_icon'] ?>" style="font-size: 5em; text-align: center;"></i>
                <div class="card-body">
                  <h5 class="card-title"><?= $userModules[$j]['Modules_name'] ?></h5>
                  <p class="card-text"><?= $userModules[$j]['Modules_description'] ?></p>
                  <div class="btn-group mx-auto w-100" role="group" aria-label="Basic mixed styles example">
                    <a href="<?= $userModules[$j]['Modules_route'] ?>/show" class="btn">
                      <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </div>









  <!--JS-->
  <?php require_once('../app/Views/assets/js/js.php') ?>
  <?php require_once('../app/Views/assets/js/dataTable.php') ?>
  <!--JS Controller-->
  <script src="../controllers/dashboard/dashboard.js"></script>
</body>

</html>