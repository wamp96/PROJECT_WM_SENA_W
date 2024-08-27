<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
<<<<<<< Updated upstream
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Serial</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Procesador</th>
                <th scope="col">RAM</th>
                <th scope="col">DISCO</th>
                <th scope="col">Valor</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Estado</th>
                <th scope="col">Action</th>                
            </tr>
        </thead>
        <tbody>
            <?php if ($elements) : ?>
                <?php foreach($elements as $obj) :  ?>
                    <tr class="text-center">
                        <td><?php echo $obj['Element_id'];?></td>
                        <td><?php echo $obj['Element_nombre'];?></td>
                        <td><?php echo $obj['Element_imagen'];?></td>
                        <td><?php echo $obj['Element_serial'];?></td>
                        <td><?php echo $obj['Brand_name'];?></td>
                        <td><?php echo $obj['Model_name'];?></td>
                        <td><?php echo $obj['Element_procesador'];?></td>
                        <td><?php echo $obj['Element_memoria_ram'];?></td>
                        <td><?php echo $obj['Element_disco'];?></td>
                        <td><?php echo $obj['Element_valor'];?></td>
                        <td><?php echo $obj['Element_stock'];?></td>
                        <td><?php echo $obj['Category_nombre'];?></td>                        
                        <td><?php echo $obj['Element_status_name'];?></td>                        
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" title="Button Show User Status" onclick="show(<?php echo $obj['Element_id'];?>)" class="btn btn-success btn-action" style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                <button type="button" title="Button Edit User Status" onclick="edit(<?php echo $obj['Element_id'];?>)" class="btn btn-warning btn-action" style="font-size: 0.5em;"><i class="bi bi-pencil-square" style="color:white"></i></button>
                                <button type="button" title="Button Delete User Status" onclick="delete_(<?php echo $obj['Element_id'];?>)" class="btn btn-danger btn-action" style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>                        
=======
                <th scope="col">Nombre Completo</th>
                <th scope="col"># Documento</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Status</th>   
                <th scope="col">Action</th>       
            </tr>
        </thead>
        <tbody>
            <?php if ($requests) : ?>
                <?php foreach($requests as $obj) :  ?>
                    <tr class="text-center">
                        <td><?php echo $obj['Request_id'];?></td>
                        <td><?php echo $obj['Full Name'];?></td>
                        <td><?php echo $obj['User_documento'];?></td>
                        <td><?php echo $obj['Request_title'];?></td>
                        <td><?php echo $obj['Request_description'];?></td>
                        <td><?php echo $obj['Request_fecha'];?></td>           
                        <td><?php echo $obj['Request_status_name'];?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" title="Button Show User Status" onclick="show(<?php echo $obj['Request_id'];?>)" class="btn btn-success btn-action" style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                <button type="button" title="Button Edit User Status" onclick="edit(<?php echo $obj['Request_id'];?>)" class="btn btn-warning btn-action" style="font-size: 0.5em;"><i class="bi bi-pencil-square" style="color:white"></i></button>
                                <button type="button" title="Button Delete User Status" onclick="delete_(<?php echo $obj['Request_id'];?>)" class="btn btn-danger btn-action" style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>                        
>>>>>>> Stashed changes
                            </div>
                        </td>
                    </tr>                
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
<<<<<<< Updated upstream
            <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Serial</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Procesador</th>
                <th scope="col">RAM</th>
                <th scope="col">DISCO</th>
                <th scope="col">Valor</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Estado</th>
                <th scope="col">Action</th>    
=======
                <th scope="col">#</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col"># Documento</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Status</th>   
                <th scope="col">Action</th>     
>>>>>>> Stashed changes
            </tr>
        </tfoot>
    </table>
</div>