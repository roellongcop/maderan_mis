
<?php if(date('Y-m-d') >= date('Y-m-d', strtotime($model->expiration_date))): ?>

<tr>
	<td><?= $model->name ?></td>
	<td><?= ($model->category) ? $model->category->name: '' ?></td>
	<td><?= $model->quantity ?></td>
	<td>₱ <?= number_format($model->price, 2) ?></td>
	<td><?= $model->expiration_date ?></td>
	</td>
</tr>
<?php endif ?>
