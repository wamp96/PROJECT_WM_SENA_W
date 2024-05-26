<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>                
            </tr>
        </thead>
        <tbody>
            <?php if ($Permissions) : ?>
                <?php foreach($Permissions as $obj) :  ?>
                    <tr class="text-center">
                        <td><?php echo $obj['Permissions_id'];?></td>
                        <td><?php echo $obj['Permissions_name'];?></td>
                        <td><?php echo $obj['Permissions_description'];?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" title="Button Show User Status" onclick="show(<?php echo $obj['Permissions_id'];?>)" class="btn btn-success btn-action" style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                <button type="button" title="Button Edit User Status" onclick="edit(<?php echo $obj['Permissions_id'];?>)" class="btn btn-warning btn-action" style="font-size: 0.5em;"><i class="bi bi-pencil-square" style="color:white"></i></button>
                                <button type="button" title="Button Delete User Status" onclick="delete_(<?php echo $obj['Permissions_id'];?>)" class="btn btn-danger btn-action" style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>                        
                            </div>
                        </td>
                    </tr>                
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
            </tr>
        </tfoot>
    </table>
</div>