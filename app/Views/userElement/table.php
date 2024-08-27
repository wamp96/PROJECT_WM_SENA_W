<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
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
                    </tr>                
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Area</th>
                <th scope="col">ID_Element</th>
                <th scope="col">Element</th>                
                <th scope="col">Element_serial</th>                
                <th scope="col">Fecha Asignacion</th>                 
            </tr>
        </tfoot>
    </table>
</div>