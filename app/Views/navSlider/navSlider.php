<div id="container-slider">
  <div class="accordion accordion-flush" id="accordionApp">
    <?php
    $url = $_SERVER['REQUEST_URI'];
    $getModuleUrl = $getModuleUrl = substr($url, strpos($url, '/') + 1, strlen($url));
    $getModuleUrl = explode("/",  $getModuleUrl);
    $subModule = "";
    $modelsLength = count($userModules);
    $selectActive = "";
    $selectShow = "";
    foreach ($userModules as $module) :
      $getModuleId = $module['Modules_fk'];
      $selectShow = "";
      if ($module['Modules_submodule'] == 0) :
    ?>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $getModuleId ?>" aria-expanded="false" aria-controls="flush-collapse<?= $getModuleId ?>">
              <i class="bi <?= $module['Modules_icon'] ?>"> <?= $module['Modules_name'] ?></i>
            </button>
          </h2>
          <div id="flush-collapse<?= $getModuleId ?>" class="accordion-collapse collapse menu-slide <?= $module['Modules_route'] == $getModuleUrl[0] ? "show" : "" ?>" data-bs-parent="#accordionApp">
           
          <ul class="list-group">
              <?php
              $selectActive = "";
              if ($module['Modules_route'] == $getModuleUrl[0]) {
                $selectActive = "active";
              }
              $subModule = '<li class="list-group-item "><a class="list-group-item ' . $selectActive . ' list-group-item-action "  href="/' . $module['Modules_route'] . '" style="cursor: pointer;"><i class="bi ' . $module['Modules_icon'] . '"> ' . $module['Modules_name'] . '</i></a></li>';
              for ($i = 0; $i < $modelsLength; $i++) :
                $elem = $userModules[$i];
                if (($getModuleId == $elem['Modules_parent_module']) && ($elem['Modules_submodule'] == 1)) {
                  $selectActive = "";

                  if ($elem['Modules_route'] == $getModuleUrl[0]) {
                    $selectActive = "active";
                  }
                  $subModule = $subModule . '<li class="list-group-item ' . $selectActive . '"><a class="list-group-item list-group-item-action" href="/' . $elem['Modules_route'] . '" style="cursor: pointer; padding-left: 25px; font-size: 0.9em;"><i class="bi ' . $elem['Modules_icon'] . '"> ' . $elem['Modules_name'] . '</i></a></li>';
                }
              endfor;
              echo ($subModule);
              $subModule = '';
              ?>
            </ul>

          </div>
        </div>

    <?php
      endif;
    endforeach; ?>
  </div>
</div>



<!-- <div class="col-2" id="container-slider">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="bi bi-person-bounding-box p-1"></i> <strong>USER</strong>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" >
                <div class="accordion-body menu-slide" style="padding : 0;">
                    <ul class="list-grop">
                        <li class="list-group-item"><a href="http://localhost:8080/user">USER</a></li>
                        <li class="list-group-item"><a href="http://localhost:8080/userStatus">USER STATUS</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-pc-display p-1"></i> <strong>ELEMENT</strong>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" >
                <div class="accordion-body menu-slide" style="padding : 0;">
                    <ul class="list-grop">
                        <li class="list-group-item"><a href="http://localhost:8080/element">ELEMENT</a></li>
                        <li class="list-group-item"><a href="http://localhost:8080/elementStatus">USER STATUS</a></li>
                        <li class="list-group-item"><a href="http://localhost:8080/category">CATEGORY</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-book p-1"></i> <strong>REQUEST</strong>                    
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" >
                <div class="accordion-body menu-slide" style="padding : 0;">
                    <ul class="list-grop">
                        <li class="list-group-item"><a href="#">User Status</a></li>
                        <li class="list-group-item"><a href="#">Role</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-gear p-1"></i> <strong>CONFIG</strong>
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" >
                <div class="accordion-body menu-slide" style="padding : 0;">
                    <ul class="list-grop">
                        <li class="list-group-item"><a href="#">User Status</a></li>
                        <li class="list-group-item"><a href="#">Role</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->