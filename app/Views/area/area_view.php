<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <?php require_once('../app/Views/assets/css/css.php'); ?>    
    <link rel="stylesheet" href="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!--Title-->
    <title><?=$title?></title>
</head>


<body>
    <!--Preload--> 
    <?php require_once('../app/Views/preload/preload.php')?>
    <!--End Preload--> 

    <!--Navbar-->
    <?php require_once('../app/Views/nav/navbar.php');?>    
    <!--End Navbar-->

    <!--Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
            <?php require_once('../app/Views/navSlider/navSlider.php') ?>
            </div>
        
            <div class="col-10">
                 <h3 class="title"><?=$title?></h3>
                <button type="button" class="btn btn-primary btn-actions" title="Button new User Status" onclick="add()" style="font-size: 0.5em;"><i class="bi bi-plus-circle-fill"></i></button>
                <!--Container Table-->
                <?php require_once('../app/Views/area/table.php');?>    
                <!--End Container Table-->
            </div>    
        </div>
    </div>
    <!--End Container-->
    
    <!--Footer-->
    <?php require_once('../app/Views/footer/footer.php');?>         
    <!--End Footer-->
    
    <!--Modal-->
    <div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="my-modallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modallabel"><?= $title?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php require_once('../app/Views/area/form.php')?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                    <button type="submit" form="my-form" id="btnSubmit" class="btn btn-primary">Send Data</button>
                </div>
            </div>
        </div>
    </div>
    <!--end Modal-->
    <!--JS-->
    <?php require_once('../app/Views/assets/js/js.php')?>
    <?php require_once('../app/Views/assets/js/dataTable.php')?>
    <!--JS Controller-->
    <script src="../controllers/area/area.js"></script>
</body>
</html>