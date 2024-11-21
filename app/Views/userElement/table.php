<?php

function getElementStatusClass($statusName)
{
    if ($statusName === 'Available') {
        return 'available';
    } elseif ($statusName === 'Assigned') {
        return 'assigned';
    } elseif ($statusName === 'Out of Stock') {
        return 'out-of-stock';
    } elseif ($statusName === 'Damaged') {
        return 'damaged';
    } else {
        return '';
    }
}

?>
<div class="body1">
    <main class="table1">
        <section class="table__header">
            <button type="button" class="btn btn-primary btn-actions" title="Button new Element" onclick="add()" style="font-size: 0.5em;"><i class="bi bi-plus-circle-fill"></i></button>
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
                        <th>Element ID <span class="icon-arrow">&UpArrow;</span></th>
                        <th>User ID <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Element Code <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Assigned Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Created At <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Updated At <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Action <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($user_elements): ?>
                        <?php foreach ($user_elements as $obj): ?>
                            <tr>
                                <td><?php echo $obj['User_element_id']; ?></td>
                                <td><?php echo $obj['Element_fk']; ?></td>
                                <td><?php echo $obj['User_fk']; ?></td>
                                <td><?php echo $obj['Element_code']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($obj['User_element_fecha'])); ?></td>
                                <td><?php echo date('d-m-Y H:i:s', strtotime($obj['create_at'])); ?></td>
                                <td><?php echo date('d-m-Y H:i:s', strtotime($obj['update_at'])); ?></td>
                                <td>
                                    <p class="status <?php echo getElementStatusClass($obj['Element_status_name']); ?>"><?php echo $obj['Element_status_name']; ?></p>
                                </td>
                                <td class="pega">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" title="Button Show Element Status"
                                            onclick="show(<?php echo $obj['User_element_id']; ?>)" class="btn btn-success btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                        <button type="button" title="Button Edit Element Status"
                                            onclick="edit(<?php echo $obj['User_element_id']; ?>)" class="btn btn-warning btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-pencil-square"
                                                style="color:white"></i></button>
                                        <button type="button" title="Button Delete Element Status"
                                            onclick="delete_(<?php echo $obj['User_element_id']; ?>)" class="btn btn-danger btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9">No se encontraron elementos.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </section>
    </main>
</div>