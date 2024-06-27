<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
        <thead class="table-dark">
            <tr class="text-center">
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
                <th scope="col">Acción</th>                
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($elements)) : ?>
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
                            </div>
                        </td>
                    </tr>                
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="14">No elements found</td>
                </tr>
            <?php endif ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
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
                <th scope="col">Acción</th>    
            </tr>
        </tfoot>
    </table>
</div>
