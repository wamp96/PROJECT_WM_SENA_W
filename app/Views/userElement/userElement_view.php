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
        <h3><?= $title ?></h3>
          <form id="formAssignElement">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <!-- Datos del usuario -->
            <div>
                <label for="user_id">Nombre y Cédula del Usuario:</label>
                <select name="User_fk" id="user_id">
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['User_id'] ?>"><?= $user['User_nombre'] ?> - <?= $user['User_cedula'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Datos del elemento -->
            <div>
                <label for="element_id">Categoría y Serial del Elemento:</label>
                <select name="Element_fk" id="element_id">
                    <?php foreach ($elements as $element): ?>
                        <option value="<?= $element['Element_id'] ?>"><?= $element['Element_categoria'] ?> - <?= $element['Element_serial'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit">Asignar Elemento</button>
          </form>
      </div>
    </div>
  </div>


  <?php require_once('../app/Views/footer/footer.php') ?>
 
  



  <!--JS-->
  <?php require_once('../app/Views/assets/js/js.php') ?>
  <?php require_once('../app/Views/assets/js/dataTable.php') ?>
  <!--JS Controller-->
  <script src="../controllers/userElement/userElement.js"></script>
</body>

</html>