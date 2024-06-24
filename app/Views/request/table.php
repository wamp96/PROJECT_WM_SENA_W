<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Numero</th>
                <th scope="col">Fecha</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Status</th>         
            </tr>
        </thead>
        <tbody>
            <?php if ($requests) : ?>
                <?php foreach($requests as $obj) :  ?>
                    <tr class="text-center">
                        <td><?php echo $obj['Request_id'];?></td>
                        <td><?php echo $obj['Request_numero'];?></td>
                        <td><?php echo $obj['Request_fecha'];?></td>
                        <td><?php echo $obj['Request_title'];?></td>
                        <td><?php echo $obj['Request_description'];?></td>
                        <td><?php echo $obj['Request_status_name'];?></td>                       
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" title="Button Show User Status" onclick="show(<?php echo $obj['Request_id'];?>)" class="btn btn-success btn-action" style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                <button type="button" title="Button Edit User Status" onclick="edit(<?php echo $obj['Request_id'];?>)" class="btn btn-warning btn-action" style="font-size: 0.5em;"><i class="bi bi-pencil-square" style="color:white"></i></button>
                                <button type="button" title="Button Delete User Status" onclick="delete_(<?php echo $obj['Request_id'];?>)" class="btn btn-danger btn-action" style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>                        
                            </div>
                        </td>
                    </tr>                
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
                <th scope="col">#</th>
                <th scope="col">Numero</th>
                <th scope="col">Fecha</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Status</th>       
            </tr>
        </tfoot>
    </table>
</div>