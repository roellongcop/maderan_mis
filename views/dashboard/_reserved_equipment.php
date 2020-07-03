<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>NAME</th>
            <th>EQUIPMENT</th>
            <th>DESCRIPTION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservation as $r): ?>
            <?php if($r->type == 'equipment'): ?>
                <tr>
                    <td><?= $r->resident->fullname ?></td>
                    <td><?= $r->equipment->name ?></td>
                    <td><?= $r->equipment->description ?></td>
                </tr>
            <?php endif ?>
        <?php endforeach; ?>
    </tbody>
</table>