<form id="my-form">
    <input type="hidden" class="form-control" id="User_id" name="User_id" value=null>
    <input type="hidden" class="form-control" id="update_at" name="update_at" value=null>
    <div class="input-group mb-3">
        <input type="number" class="form-control" name="User_documento" id="User_documento" placeholder="Numero de Documento">
        <span class="input-group-text" id="User_documento2">@</span>
        <input type="email" class="form-control" name="User_correo" id="User_correo" placeholder="Email">

    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="User_nombre2">Name</span>
        <input type="text" class="form-control" name="User_nombre" id="User_nombre" >
        <span class="input-group-text" id="User_apellido_paterno2">First Name</span>
        <input type="text" class="form-control" name="User_apellido_paterno" id="User_apellido_paterno" >
     
    </div>
   
    <div class="input-group mb-3">
        <span class="input-group-text" id="User_apellido_materno2">Last Name</span>
        <input type="text" class="form-control" name="User_apellido_materno" id="User_apellido_materno" >
        <span class="input-group-text" id="User_telefono2">Phone</span>
        <input type="number" class="form-control" name="User_telefono" id="User_telefono">
        
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="User_password2">Password</span>
        <input type="password" class="form-control" name="User_password" id="User_password" placeholder="*****">
        <span class="input-group-text" id="Repeat_password2">Repeat Password</span>
        <input type="password" class="form-control " id="Repeat_password" name="Repeat_password" placeholder="*****" required>
        
    </div>

    <div class="input-group mb-3">
        <select class="form-select" aria-label="Id Parent" id="City_fk" name="City_fk" disabled>
            <option value=NULL selected>Open this select City</option>
                <?php if ($cities) : ?>
                    <?php foreach ($cities as $obj) : ?>
                        <option value="<?= $obj['City_id'] ?>"><?= $obj['City_name'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
        </select>
        <select class="form-select" aria-label="Id Parent" id="Area_fk" name="Area_fk" disabled>
            <option value=NULL selected>Open this select Area</option>
                <?php if ($areas) : ?>
                    <?php foreach ($areas as $obj) : ?>
                        <option value="<?= $obj['Area_id'] ?>"><?= $obj['Area_name'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
        </select>
    </div>

    <div class="input-group mb-3">
        <select class="form-select" aria-label="Id Parent" id="Roles_fk" name="Roles_fk" disabled>
            <option value=NULL selected>Open this select Role</option>
                <?php if ($roles) : ?>
                    <?php foreach ($roles as $obj) : ?>
                        <option value="<?= $obj['Roles_id'] ?>"><?= $obj['Roles_name'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
        </select>
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