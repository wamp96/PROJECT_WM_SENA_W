
<div class="body1">
    <main class="table1">
        <section class="table__header">
            <h1><?= $title ?></h1>
            <div class="input-g">
                <input type="search" placeholder="Search Data...">
                <img src="../assets/img/icons/lupa.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                      <th># <span class="icon-arrow">&UpArrow;</span></th>
                      <th>Id Module <span class="icon-arrow">&UpArrow;</span></th>
                      <th>Id Role <span class="icon-arrow">&UpArrow;</span></th>
                      <th>Actions <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                  <?php if ($roleModules) : ?>
                    <?php foreach ($roleModules  as $obj) : ?>
                      <tr>
                        <td><?php echo $obj['RoleModules_id']; ?></td>
                        <td><?php echo $obj['Modules_name']; ?></td>
                        <td><?php echo $obj['Roles_name']; ?></td>
                        <td class="pega">
                          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" title="Button Edit User Status" class="btn btn-success btn-action"
                                onclick="editModules(<?php echo $obj['Roles_fk']; ?>,<?php echo $obj['RoleModules_id']; ?>)"
                                style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i>
                            </button>
                            <button type="button" title="Button Show User Status" 
                                onclick="editPermissions(<?php echo $obj['Modules_fk']; ?>,<?php echo $obj['RoleModules_id']; ?>)" class="btn btn-warning btn-action"
                                style="font-size: 0.5em;"><i class="bi bi-pencil-square"
                                style="color:white"></i>
                            </button>
                            <button type="button" title="Button Delete User Status" 
                                onclick="delete_(<?php echo $obj['RoleModules_id']; ?>)" class="btn btn-danger btn-action"
                                style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
            </table>
        </section>
    </main>
</div>