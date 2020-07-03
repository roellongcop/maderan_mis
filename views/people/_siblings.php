
<table class="table table-bordered ">
    <thead>
        <th>NAME OF CHILDREN</th>
        <th>BIRTHDAY</th>
        <th>AGE</th>
    </thead>

    <tbody class="tbl-body">
        <?php if($model->siblings): ?>
            <?php foreach ($model->siblings as $sibling): ?>
                <tr>
                    <td><?= $sibling->fullname ?></td>
                    <td><?= $sibling->date_of_birth ?></td>
                    <td><?= $sibling->age ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

