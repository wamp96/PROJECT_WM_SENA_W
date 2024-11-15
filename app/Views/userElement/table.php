<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
    <button type="button" class="btn btn-primary btn-actions" title="Button new User Element" onclick="add()" style="font-size: 0.5em;"><i class="bi bi-plus-circle-fill"></i></button>
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
<<<<<<< Updated upstream
                <th scope="col">Name</th>
                <th scope="col">Area</th>
                <th scope="col">ID_Element</th>
                <th scope="col">Element</th>                
                <th scope="col">Element_serial</th>                
                <th scope="col">Fecha Asignacion</th>                               
            </tr>
        </thead>
        <tbody>
            <?php if ($user_elements) : ?>
                <?php foreach($user_elements as $obj) :  ?>
                    <tr class="text-center">
                        <td><?php echo $obj['User_element_id'];?></td>
                        <td><?php echo $obj['Full Name'];?></td>
                        <td><?php echo $obj['Area_name'];?></td>
                        <td><?php echo $obj['Element_id'];?></td>
                        <td><?php echo $obj['Element_nombre'];?></td>
                        <td><?php echo $obj['Element_serial'];?></td>
                        <td><?php echo $obj['User_element_fecha'];?></td>
=======
                <th scope="col">Full Name</th>
                <th scope="col">Document</th>
                <th scope="col">Area</th>
                <th scope="col">Element</th>
                <th scope="col">Serial</th>
                <th scope="col">Assignment Date</th>
                <th scope="col">Action</th>                
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($userElements)) : ?>
                <?php foreach($userElements as $element) :  ?>
                    <tr class="text-center">
                        <td><?php echo $element['User_element_id']; ?></td>
                        <td><?php echo $element['Full Name']; ?></td>
                        <td><?php echo $element['User_documento']; ?></td>
                        <td><?php echo $element['Area_name']; ?></td>
                        <td><?php echo $element['Element_nombre']; ?></td>
                        <td><?php echo $element['Element_serial']; ?></td>
                        <td><?php echo $element['User_element_fecha']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" title="Show Element" onclick="show(<?php echo $element['User_element_id']; ?>)" class="btn btn-success btn-action" style="font-size: 0.5em;"><i class="bi bi-eye-fill"></i></button>
                                <button type="button" title="Edit Element" onclick="edit(<?php echo $element['User_element_id']; ?>)" class="btn btn-warning btn-action" style="font-size: 0.5em;"><i class="bi bi-pencil-square" style="color:white"></i></button>
                                <button type="button" title="Delete Element" onclick="delete_(<?php echo $element['User_element_id']; ?>)" class="btn btn-danger btn-action" style="font-size: 0.5em;"><i class="bi bi-trash-fill"></i></button>                        
                            </div>
                        </td>
>>>>>>> Stashed changes
                    </tr>                
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
                <th scope="col">#</th>
<<<<<<< Updated upstream
                <th scope="col">Name</th>
                <th scope="col">Area</th>
                <th scope="col">ID_Element</th>
                <th scope="col">Element</th>                
                <th scope="col">Element_serial</th>                
                <th scope="col">Fecha Asignacion</th>                 
=======
                <th scope="col">Full Name</th>
                <th scope="col">Document</th>
                <th scope="col">Area</th>
                <th scope="col">Element</th>
                <th scope="col">Serial</th>
                <th scope="col">Assignment Date</th>
                <th scope="col">Action</th>
>>>>>>> Stashed changes
            </tr>
        </tfoot>
    </table>
</div>
