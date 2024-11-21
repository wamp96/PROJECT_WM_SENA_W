<form id="my-form" method="POST" action="<?= base_url('userElement/assign') ?>">
    <!-- Campo oculto para el ID de usuario -->
    <input type="hidden" id="User_element_id" name="User_element_id" value="<?= isset($userElementId) ? $userElementId : '' ?>">

    <!-- Asignación del Usuario -->
    <div class="input-group mb-3">
        <select class="form-select" aria-label="Select User" id="User_fk" name="User_fk" required>
            <option value="" selected disabled>Open this select User</option>
            <?php if ($users) : ?>
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user['User_id'] ?>"><?= $user['User_nombre'] . ' ' . $user['User_apellido_paterno'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <!-- Asignación del Elemento -->
    <div class="input-group mb-3">
        <select class="form-select" aria-label="Select Element" id="Element_fk" name="Element_fk" required>
            <option value="" selected disabled>Open this select Element</option>
            <?php if ($elements) : ?>
                <?php foreach ($elements as $element) : ?>
                    <option value="<?= $element['Element_id'] ?>"><?= $element['Element_nombre'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <!-- Fecha de Asignación -->
    <div class="input-group mb-3">
        <span class="input-group-text">Assign Date</span>
        <input type="date" class="form-control" name="User_element_fecha" id="User_element_fecha" required>
    </div>

    <!-- Campos para la creación y actualización de fechas (con valores automáticos por servidor) -->
    <input type="hidden" name="create_at" value="<?= date('Y-m-d H:i:s') ?>"> <!-- Fecha de creación -->
    <input type="hidden" name="update_at" value="<?= date('Y-m-d H:i:s') ?>"> <!-- Fecha de actualización -->

    <!-- Botones -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Assign Element</button>
    </div>
</form>
