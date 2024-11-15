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

<<<<<<< Updated upstream
    <body>
        <!--Preload -->
        <?php require_once('../app/Views/preload/preload.php') ?>
        <!--End Preload -->
        <!--Navbar-->
        <?php require_once('../app/Views/nav/navbar.php') ?>
        <!--End Navbar-->
        <!--Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                <!--Navbar Slider-->
                    <?php require_once('../app/Views/navSlider/navSlider.php') ?>
                <!--End Navbar Slider-->
                </div>
                
                <div class="col-10">
                    <h3 class="title"><?= $title ?></h3>
                    <button type="button" class="btn btn-primary btn-actions" title="Button new User Status" onclick="add()" style="font-size: 0.5em;">
                    <i class="bi bi-plus-circle-fill"></i> </button>
                    <!--Container Table-->
                    <?php require_once('../app/Views/userElement/table.php') ?>
                    <!--End Container Table-->
                </div>
            </div>
        </div>
        <!--End Container-->
        <!--Footer-->
        <?php require_once('../app/Views/footer/footer.php') ?>
        <!--End Footer-->

        <!--Modal-->
        <div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="my-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="my-modalLabel"><?= $title ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Form-->
                        <?php require_once('../app/Views/userElement/form.php') ?>
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
        <?php require_once('../app/Views/assets/js/dataTable.php') ?>
        <!--JS Controller-->
        <script src="../controllers/userElement/userElement.js"></script>
    </body>
</html>
=======
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
  <!--Navbar-->
  <?php require_once('../app/Views/nav/navbar.php') ?>
  <!--End Navbar-->
  <!--Container-->

  <div class="wrapper">
    <?php require_once('../app/Views/navSlider/navSlider.php') ?>
    <div class=" main">
      <?php require_once('../app/Views/nav/navbar.php') ?>
      <!--Container Table-->
      <div class="tableWrapper">
        <?php require_once('../app/Views/userElement/table.php') ?>
      </div>

      <!--End Container Table-->
    </div>
  </div>

  <div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="my-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modalLabel"><?= $title ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--Form for UserElement-->
          <?php require_once('../app/Views/userElement/form.php'); ?>
          <!--End Form-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="userElement-form" id="btnSubmit" class="btn btn-primary">Send Data</button>
        </div>
      </div>
    </div>
  </div>


  <?php require_once('../app/Views/footer/footer.php') ?>





  <!--JS-->
  <?php require_once('../app/Views/assets/js/js.php') ?>
  <?php require_once('../app/Views/assets/js/dataTable.php') ?>
  <!--JS Controller-->
  <script src="../controllers/userElement/userElement.js"></script>
  <script>
    // Aquí va el código JavaScript para cargar los datos del usuario seleccionado
    document.getElementById('User_fk').addEventListener('change', function () {
        let userId = this.value;
        if (userId) {
            fetch(`url_para_obtener_usuario/${userId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('Full_Name').value = data.fullName;
                    document.getElementById('User_documento').value = data.document;
                    document.getElementById('Area_fk').value = data.areaId;
                    // Agrega más asignaciones según los datos que quieras mostrar
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>
</body>

</html>
>>>>>>> Stashed changes
