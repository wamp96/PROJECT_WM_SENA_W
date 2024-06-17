<!DOCTYPE html>
<html lang="en">
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mt-5 mx-auto">
                <div class="card">
                    <img src="../assets/img/logos/logo.png" class="card-img-top w-25 mx-auto" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?=$title?></h5>
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
                    <h5 class="modal-title" id="my-modalLable"><?= $title?></h5>                
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
</html>