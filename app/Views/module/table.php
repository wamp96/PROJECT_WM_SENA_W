<div class="body1">
  <main class="table1">
    <section class="table__header">
      <button type="button" class="btn btn-primary btn-actions" title="Button new User Status" onclick="add()" style="font-size: 0.5em;"><i class="bi bi-plus-circle-fill"></i></button>
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
            <th>Name <span class="icon-arrow">&UpArrow;</span></th>
            <th>Description <span class="icon-arrow">&UpArrow;</span></th>
            <th>Route <span class="icon-arrow">&UpArrow;</span></th>
            <th>Icon <span class="icon-arrow">&UpArrow;</span></th>
            <th>Submodule <span class="icon-arrow">&UpArrow;</span></th>
            <th>Parent Module <span class="icon-arrow">&UpArrow;</span></th>
            <th>Actions <span class="icon-arrow">&UpArrow;</span></th>
          </tr>
        </thead>
        <tbody>
          <?php if ($modules) : ?>
            <?php foreach ($modules  as $obj) : ?>
              <tr class="text-center">
                <td><?php echo $obj['Modules_id']; ?></td>
                <td><?php echo $obj['Modules_name']; ?></td>
                <td><?php echo $obj['Modules_description']; ?></td>
                <td><?php echo $obj['Modules_route']; ?></td>
                <td><i class="bi <?php echo $obj['Modules_icon']; ?>"></i></td>
                <td><?php $check = ($obj['Modules_submodule'] == '0') ? 0 : 1; ?>
                  <div class="form-check form-switch">
                    <input class="form-check-input" style="width: 50%;margin: 0 auto;padding-top: 20px;" type="checkbox"
                      role="switch" id="flexSwitchCheckChecked" <?= ($check == 0) ? "" : "checked" ?> disabled>
                  </div>
                </td>
                <td><?php echo $obj['Modules_parent_module']; ?></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" title="Button Show User Status"
                      onclick="show(<?php echo $obj['Modules_id']; ?>)" class="btn btn-success btn-actions"><i class="bi bi-eye-fill"></i></button>
                    <button type="button" title="Button Edit User Status"
                      onclick="edit(<?php echo $obj['Modules_id']; ?>)" class="btn btn-warning btn-actions"><i class="bi bi-pencil-square" style="color:white"></i> </button>
                    <button type="button" title="Button Delete User Status"
                      onclick="delete_(<?php echo $obj['Modules_id']; ?>)" class="btn btn-danger btn-actions"><i class="bi bi-trash-fill"></i></button>
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