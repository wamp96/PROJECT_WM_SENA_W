<form id="user-element-form">
    <!-- Campo oculto para el ID del elemento de usuario -->
    <input type="hidden" class="form-control" id="User_element_id" name="User_element_id" value=null>

    <!-- Nombre Completo y Documento -->
    <div class="input-group mb-3">
        <label class="input-group-text" for="Full_Name">Full Name</label>
        <select class="form-select" id="Full_Name" name="Full_Name" required>
            <option value=NULL selected>Select Full Name</option>
            <?php if ($users) : ?>
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user['User_id'] ?>"><?= $user['User_nombre'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        
        <label class="input-group-text" for="Document">Document</label>
        <select class="form-select" id="Document" name="Document" required>
            <option value=NULL selected>Select Document</option>
            <?php if ($documents) : ?>
                <?php foreach ($documents as $document) : ?>
                    <option value="<?= $document['User_document'] ?>"><?= $document['User_document'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <!-- Área y Elemento -->
    <div class="input-group mb-3">
        <label class="input-group-text" for="Area">Area</label>
        <select class="form-select" id="Area" name="Area" required>
            <option value=NULL selected>Select Area</option>
            <?php if ($areas) : ?>
                <?php foreach ($areas as $area) : ?>
                    <option value="<?= $area['Area_id'] ?>"><?= $area['Area_name'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        
        <label class="input-group-text" for="Element">Element</label>
        <select class="form-select" id="Element" name="Element" required>
            <option value=NULL selected>Select Element</option>
            <?php if ($elements) : ?>
                <?php foreach ($elements as $element) : ?>
                    <option value="<?= $element['Element_id'] ?>"><?= $element['Element_nombre'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <!-- Serial y Fecha de Asignación -->
    <div class="input-group mb-3">
        <label class="input-group-text" for="Serial">Serial</label>
        <input type="text" class="form-control" id="Serial" name="Serial" placeholder="Element Serial" required>

        <label class="input-group-text" for="Assignment_Date">Assignment Date</label>
        <input type="date" class="form-control" id="Assignment_Date" name="Assignment_Date" required>
    </div>
</form>
