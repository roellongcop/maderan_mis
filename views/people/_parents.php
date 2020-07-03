
<table class="table table-bordered ">
    <thead>
        <th>NAME OF CHILDREN</th>
        <th>BIRTHDAY</th>
        <th>AGE</th>
    </thead>

    <tbody class="tbl-body">
        <?php if($model->parents): ?>
            <?php foreach ($model->parents as $parent): ?>
                <tr>
                    <td><?= $parent->fullname ?></td>
                    <td><?= $parent->date_of_birth ?></td>
                    <td><?= $parent->age ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

