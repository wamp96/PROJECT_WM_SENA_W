<?php 

function getUserStatusClass($statusName) {
    if ($statusName === 'Active') { 
        return 'active';
    } elseif ($statusName === 'Inactive') { 
        return 'inactive';
    } elseif ($statusName === 'Blocked') {
        return 'blocked';
    } elseif ($statusName === 'Delete') {
        return 'class-for-status-3';
    }else {
        return '';
    }
}


?>
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
                        <th>N_Documento <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nombre <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Apellidos <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Telefono <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Correo <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Password <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Ciudad <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Area <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Rol <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Estatus <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Action <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users): ?>
                        <?php foreach ($users as $obj): ?>
                            <tr>
                                <td><?php echo $obj['User_id']; ?></td>
                                <td><?php echo $obj['User_documento']; ?></td>
                                <td><?php echo $obj['User_nombre']; ?></td>
                                <td><?php echo $obj['User_apellido_paterno'] . ' ' . $obj['User_apellido_materno']; ?></td>
                                <td><?php echo $obj['User_telefono']; ?></td>
                                <td><?php echo $obj['User_correo']; ?></td>
                                <td><?php echo '*****';//echo str_repeat('*',strlen($obj['User_password'])); ?></td>
                                <td><?php echo $obj['City_name']; ?></td>
                                <td><?php echo $obj['Area_name']; ?></td>
                                <td><?php echo $obj['Roles_name']; ?></td>
                                <td><p class="status <?php echo getUserStatusClass($obj['User_status_name']); ?>"><?php echo $obj['User_status_name']; ?></p></td>
                                <td class="pega">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" title="Button Show User Status"
                                            onclick="show(<?php echo $obj['User_id']; ?>)" class="btn btn-success btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                        <button type="button" title="Button Edit User Status"
                                            onclick="edit(<?php echo $obj['User_id']; ?>)" class="btn btn-warning btn-action"
                                            style="font-size: 0.5em;"><i class="bi bi-pencil-square"
                                                style="color:white"></i></button>
                                        <button type="button" title="Button Delete User Status"
                                            onclick="delete_(<?php echo $obj['User_id']; ?>)" class="btn btn-danger btn-action"
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