<form id="my-form">
    <input type="hidden" class="form-control" id="Request_id" name="Request_id" value=null>
    <input type="hidden" class="form-control" id="update_at" name="update_at" value=null>
<<<<<<< Updated upstream
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Request_description" id="Request_description" placeholder="Name">
            <label for="Element_nombre">Descripcion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Element_imagen" id="Element_imagen" placeholder="Name">
            <label for="Element_imagen">Imagen</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Element_serial" id="Element_serial" placeholder="Name">
            <label for="Element_serial">Serial</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Element_procesador" id="Element_procesador" placeholder="Name">
            <label for="Element_procesador">Procesador</label>
        </div> 
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="Element_memoria_ram" id="Element_memoria_ram" placeholder="Name">
            <label for="Element_memoria_ram">RAM</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="Element_disco" id="Element_disco" placeholder="Name">
            <label for="Element_disco">DISCO</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Element_valor" id="Element_valor" placeholder="Name">
            <label for="Element_valor">VALOR</label>
        </div>
        <div class="form-floating mb-3 col-12">
            <select class="form-select" aria-label="Id Parent" id="Category_fk" name="Category_fk" disabled>
                <option value=NULL selected>Open this select Categoria</option>
                    <?php if ($categories) : ?>
                        <?php foreach ($categories as $obj) : ?>
                            <option value="<?= $obj['Category_id'] ?>"><?= $obj['Category_nombre'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </select>
        </div>
        <div class="form-floating mb-3 col-12">           
            <select class="form-select" aria-label="Id Parent" id="Element_status_fk" name="Element_status_fk" disabled>
                <option value=NULL selected>Open this select Element  Status</option>
                    <?php if ($element_status) : ?>
                        <?php foreach ($element_status as $obj) : ?>
                            <option value="<?= $obj['Element_status_id'] ?>"><?= $obj['Element_status_name'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </select>            
        </div>
        <div class="form-floating mb-3 col-12">
            <select class="form-select" aria-label="Id Parent" id="Brand_fk" name="Brand_fk" disabled>
                <option value=NULL selected>Open this select Tipo</option>
                    <?php if ($brands) : ?>
                        <?php foreach ($brands as $obj) : ?>
                            <option value="<?= $obj['Brand_id'] ?>"><?= $obj['Brand_name'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </select>
        </div>
        <div class="form-floating mb-3 col-12">
            <select class="form-select" aria-label="Id Parent" id="Model_Brand_fk" name="Model_Brand_fk" disabled>
                <option value=NULL selected>Open this select Modelo</option>
                    <?php if ($models) : ?>
                        <?php foreach ($models as $obj) : ?>
                            <script> $Brand_fk = document.getElementById('Brand_fk') </script>
                            <?php if ($obj['Brand_fk'] == $Brand_fk) : ?>
                                <option value="<?= $obj['Model_id'] ?>"><?= $obj['Model_name'] ?></option>
                            <?php endif; ?>    
                        <?php endforeach; ?>
                    <?php endif; ?>       
            </select>
        </div>                    
=======
    <input type="hidden" class="form-control" id="Request_fecha" name="Request_fecha" value=null>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Request_title" id="Request_title" placeholder="Name">
            <label for="Request_title">Title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="Request_description" id="Request_description" placeholder="Name">
            <label for="Request_description">Descripcion</label>
        </div>
        <div class="form-floating mb-3 col-12">
            <select class="form-select" aria-label="Id Parent" id="Request_status_fk" name="Request_status_fk" disabled>
                <option value=NULL selected>Open this select Status</option>
                    <?php if ($request_status) : ?>
                        <?php foreach ($request_status as $obj) : ?>
                            <option value="<?= $obj['Request_status_id'] ?>"><?= $obj['Request_status_name'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </select>
        </div>              
>>>>>>> Stashed changes
    </form>

