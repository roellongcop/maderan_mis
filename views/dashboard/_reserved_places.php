<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>NAME</th>
            <th>PLACE</th>
            <th>DESCRIPTION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservation as $r): ?>
            <?php if($r->type == 'place'): ?>
                <tr>
                    <td><?= $r->resident->fullname ?></td>
                    <td><?= $r->place->name ?></td>
                    <td><?= $r->place->description ?></td>
                </tr>
            <?php endif ?>
        <?php endforeach; ?>
    </tbody>
</table>