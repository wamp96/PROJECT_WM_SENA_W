<form id="my-form">
    <input type="hidden" id="User_element_id" name="User_element_id">

    <div class="input-group mb-3">
        <label for="User_fk" class="form-label">Select User</label>
        <select class="form-select" id="User_fk" name="User_fk" required>
            <option value="" disabled selected>Select a user</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['User_id'] ?>"><?= $user['User_nombre'] . ' ' . $user['User_apellido_paterno'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="input-group mb-3">
        <label for="Element_fk" class="form-label">Select Element</label>
        <select class="form-select" id="Element_fk" name="Element_fk" required>
            <option value="" disabled selected>Select an element</option>
            <?php foreach ($elements as $element): ?>
                <option value="<?= $element['Element_id'] ?>"><?= $element['Element_serial'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="input-group mb-3">
        <label for="User_element_fecha" class="form-label">Assign Date</label>
        <input type="date" id="User_element_fecha" name="User_element_fecha" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
