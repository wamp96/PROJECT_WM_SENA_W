<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">N_Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Password</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Area</th>
                <th scope="col">Rol</th>
                <th scope="col">Estatus</th>
                <th scope="col">Action</th>                
            </tr>
        </thead>
        <tbody>
            <?php if ($users) : ?>
                <?php foreach($users as $obj) :  ?>
                    <tr class="text-center">
                        <td><?php echo $obj['User_id'];?></td>
                        <td><?php echo $obj['User_documento'];?></td>
                        <td><?php echo $obj['User_nombre'];?></td>
                        <td><?php echo $obj['User_apellido_paterno'] . ' ' . $obj['User_apellido_materno'];?></td>
                        <td><?php echo $obj['User_telefono'];?></td>
                        <td><?php echo $obj['User_correo'];?></td>
                        <td><?php echo '*****';//echo str_repeat('*',strlen($obj['User_password']));?></td>                        
                        <td><?php echo $obj['City_name'];?></td>
                        <td><?php echo $obj['Area_name'];?></td>    
                        <td><?php echo $obj['Roles_name'];?></td>                        
                        <td><?php echo $obj['User_status_name'];?></td>                        
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" title="Button Show User Status" onclick="show(<?php echo $obj['User_id'];?>)" class="btn btn-success btn-action" style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                <button type="button" title="Button Edit User Status" onclick="edit(<?php echo $obj['User_id'];?>)" class="btn btn-warning btn-action" style="font-size: 0.5em;"><i class="bi bi-pencil-square" style="color:white"></i></button>
                                <button type="button" title="Button Delete User Status" onclick="delete_(<?php echo $obj['User_id'];?>)" class="btn btn-danger btn-action" style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>                        
                            </div>
                        </td>
                    </tr>                
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
                <th scope="col">#</th>
                <th scope="col">N_Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Password</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Area</th>
                <th scope="col">Rol</th>
                <th scope="col">Estatus</th>
                <th scope="col">Action</th> 
            </tr>
        </tfoot>
    </table>
</div>