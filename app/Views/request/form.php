<form id="my-form">
    <input type="hidden" class="form-control" id="Request_id" name="Request_id" value=null>
    <input type="hidden" class="form-control" id="update_at" name="update_at" value=null>
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
    </form>

