<div class="body1">
    <main class="table1">
        <section class="table__header">
            <button type="button" class="btn btn-primary btn-actions" title="Button new User Status" onclick="add()" style="font-size: 0.5em;"><i class="bi bi-plus-circle-fill"></i></button>
            <h1><?= $title ?></h1>
            <div class="input-g">
                <input type="search" placeholder="Search Data...">
                <img src="../assets/img/icons/lupa.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th># <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Elemento ID <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Usuario ID <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Fecha Asignación <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Fecha Creación <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Fecha Actualización <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Acciones <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>


                <tbody>
                    <?php if (!empty($user_elements)): ?>
                        <?php foreach ($user_elements as $element): ?>
                            <tr>
                                <td><?= $element['User_element_id'] ?></td>
                                <td><?= $element['Element_serial'] ?></td>
                                <td><?= $element['User_nombre'] ?></td>
                                
                                <td><?= date('d-m-Y', strtotime($element['User_element_fecha'])) ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($element['create_at'])) ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($element['update_at'])) ?></td>
                                <td>
                                    <button onclick="show(<?= $element['User_element_id'] ?>)" class="btn btn-success">View</button>
                                    <button onclick="edit(<?= $element['User_element_id'] ?>)" class="btn btn-warning">Edit</button>
                                    <button onclick="delete_(<?= $element['User_element_id'] ?>)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No data found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>



            </table>
        </section>
    </main>
</div>