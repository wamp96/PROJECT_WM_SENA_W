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
                        <th>Action <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($models) : ?>
                        <?php foreach ($models as $obj) :  ?>
                            <tr class="text-center">
                                <td><?php echo $obj['Model_id']; ?></td>
                                <td><?php echo $obj['Model_name']; ?></td>
                                <td><?php echo $obj['Model_description']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" title="Button Show User Status"
                                            onclick="show(<?php echo $obj['Model_id']; ?>)" class="btn btn-success btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                        <button type="button" title="Button Edit User Status"
                                            onclick="edit(<?php echo $obj['Model_id']; ?>)" class="btn btn-warning btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-pencil-square" style="color:white"></i></button>
                                        <button type="button" title="Button Delete User Status"
                                            onclick="delete_(<?php echo $obj['Model_id']; ?>)" class="btn btn-danger btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>
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