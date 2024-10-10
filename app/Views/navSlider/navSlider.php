<aside id="sidebar">
    <div class="d-flex">
        <button id="toggle-btn" type="button">
            <img class="p-1" src="../assets/img/logos/logo.png" alt="">
        </button>
    </div>
    <ul class="sidebar-nav">
        <?php
        $url = $_SERVER['REQUEST_URI'];
        $getModuleUrl = $getModuleUrl = substr($url, strpos($url, '/') + 1, strlen($url));
        $getModuleUrl = explode("/", $getModuleUrl);
        $subModule = "";
        $modelsLength = count($userModules);
        $selectActive = "";
        $selectShow = "";
        foreach ($userModules as $module):
            $getModuleId = $module['Modules_fk'];
            $selectShow = "";
            if ($module['Modules_submodule'] == 0):
                ?>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#auth<?= $getModuleId ?>"
                        aria-expanded="false" aria-controls="auth<?= $getModuleId ?>">
                        <i class="bi <?= $module['Modules_icon'] ?>">
                            <span><?= $module['Modules_name'] ?></span> 
                        </i>
                    </a>
                    <ul id="auth<?= $getModuleId ?>" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <?php
                            $selectActive = "";
                            if ($module['Modules_route'] == $getModuleUrl[0]) {
                                $selectActive = "active";
                            }
                            $subModule = '<li class="sidebar-item ' . $selectActive . '"><a class="sidebar-link2 sidebar-link "  href="/' . $module['Modules_route'] . '"><i class="bi ' . $module['Modules_icon'] . '"><span> ' . $module['Modules_name'] . '</span></i></a></li>';
                            for ($i = 0; $i < $modelsLength; $i++):
                                $elem = $userModules[$i];
                                if (($getModuleId == $elem['Modules_parent_module']) && ($elem['Modules_submodule'] == 1)) {
                                    $selectActive = "";

                                    if ($elem['Modules_route'] == $getModuleUrl[0]) {
                                        $selectActive = "active";
                                    }
                                    $subModule = $subModule . '<li class="sidebar-item ' . $selectActive . '"><a class="sidebar-link2 sidebar-link" href="/' . $elem['Modules_route'] . '"><i class="bi ' . $elem['Modules_icon'] . '"><span> ' . $elem['Modules_name'] . '</span></i></a></li>';
                                }
                            endfor;
                            echo ($subModule);
                            $subModule = '';
                            ?>
                        </ul>
                </li>
                <?php
            endif;
        endforeach; ?>

    </ul>
</aside>
