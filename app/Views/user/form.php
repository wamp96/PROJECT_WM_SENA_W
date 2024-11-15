<form id="user-element-form">
    <!-- Select de Usuario -->
    <div class="form-group mb-3">
        <label for="User_fk">Select User</label>
        <select class="form-select" id="User_fk" name="User_fk">
            <option value="">Select a user</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['User_id'] ?>"></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Otros campos del formulario que se llenarán automáticamente -->
    <div class="form-group mb-3">
        <label for="User_documento">Document</label>
        <input type="text" class="form-control" id="User_documento" name="User_documento" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="Area_fk">Area</label>
        <input type="text" class="form-control" id="Area_fk" name="Area_fk" readonly>
    </div>

    <!-- Agrega otros campos necesarios aquí -->
</form>
