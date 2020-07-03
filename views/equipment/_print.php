<tr>
	<td><?= $model->name ?></td>
	<td><?= $model->description ?></td>
	<td><?= ($model->category) ? $model->category->name: '' ?></td>
	<td><?= $model->quantity ?></td>
	<td><?= $model->unit->name ?></td>
	<td><?= Yii::$app->params['is_rentable'][$model->is_rentable] ?></td>
	<td class="text-right"> <?= number_format($model->rent_price, 2) ?></td>
	<td><?= Yii::$app->params['_status'][$model->status] ?></td>
</tr>

