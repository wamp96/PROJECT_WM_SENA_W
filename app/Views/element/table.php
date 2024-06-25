<div class="table-responsive mx-auto">
    <table class="table" id="table-index">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Serial</th>
                <th scope="col">Procesador</th>
                <th scope="col">Memoria</th>
                <th scope="col">Disco</th>
                <th scope="col">Valor</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Status</th>
                <th scope="col">Brand</th>
                <th scope="col">Action</th>                
            </tr>
        </thead>
        <tbody>
            <?php if ($elements) : ?>
                <?php foreach($elements as $obj) :  ?>
                    
                    <tr class="text-center">
                        <td><?php var_dump($elements) ;?></td>
                    </tr>                
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot class="table-dark">
            <tr class="text-center">    
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Serial</th>
                <th scope="col">Procesador</th>
                <th scope="col">Memoria</th>
                <th scope="col">Disco</th>
                <th scope="col">Valor</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Status</th>
                <th scope="col">Brand</th>
                <th scope="col">Action</th>    
            </tr>
        </tfoot>
    </table>
</div>