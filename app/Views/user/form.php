<form id="my-form">
    <input type="hidden" class="form-control" id="User_id" name="User_id" value=null>
    <input type="hidden" class="form-control" id="update_at" name="update_at" value=null>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" name="User_documento" id="User_documento" placeholder="Numero de Documento">
        <label for="User_documento">N_Documento</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="User_nombre" id="User_nombre" placeholder="Name">
        <label for="User_nombre">Nombre</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="User_apellido_paterno" id="User_apellido_paterno" placeholder="Name">
        <label for="User_apellido_paterno">Apellido Paterno</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="User_apellido_materno" id="User_apellido_materno" placeholder="Name">
        <label for="User_apellido_materno">Apellido Materno</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="User_ciudad" id="User_ciudad" placeholder="Name">
        <label for="User_ciudad">Ciudad</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="User_area" id="User_area" placeholder="Name">
        <label for="User_area">Area</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" name="User_telefono" id="User_telefono" placeholder="Name">
        <label for="User_telefono">Telefono</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="User_correo" id="User_correo" placeholder="Name">
        <label for="User_correo">Correo</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" name="User_password" id="User_password" placeholder="Name">
        <label for="User_password">Password</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control " id="Repeat_password" name="Repeat_password" placeholder="Repeat Password" required>
        <label for="Repeat_password">Repeat Password </label>
    </div>

    <div class="form-floating mb-3 col-12">
        <select class="form-select" aria-label="Id Parent" id="Roles_fk" name="Roles_fk" disabled>
            <option value=NULL selected>Open this select Role</option>
                <?php if ($roles) : ?>
                    <?php foreach ($roles as $obj) : ?>
                        <option value="<?= $obj['Roles_id'] ?>"><?= $obj['Roles_name'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
        </select>
        </div>
        <div class="form-floating mb-3 col-12">           
            <select class="form-select" aria-label="Id Parent" id="User_status_fk" name="User_status_fk" disabled>
                <option value=NULL selected>Open this select User Status</option>
                    <?php if ($user_status) : ?>
                        <?php foreach ($user_status as $obj) : ?>
                            <option value="<?= $obj['User_status_id'] ?>"><?= $obj['User_status_name'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </select>            
        </div>
</form>