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
        
        <!--Container-->
                <div class="wrapper">
                    <?php require_once('../app/Views/navSlider/navSlider.php') ?>
                    <div class=" main">
                    <?php require_once('../app/Views/nav/navbar.php') ?>
                        <h3 class="title"><?= $title ?></h3>
                        <button type="button" class="btn btn-primary btn-actions" title="Button new User Status" onclick="add()" style="font-size: 0.5em;">
                        <i class="bi bi-plus-circle-fill"></i> </button>
                        <!--Container Table-->
                        <?php require_once('../app/Views/element/table.php')?>
                        <!--End Container Table-->
                    </div>
                </div>
            
                
        
    
        <!--End Container-->

        <!--End Footer-->

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
                        <?php require_once('../app/Views/element/form.php') ?>
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
        <script src="../controllers/element/element.js"></script>
    </body>
</html>