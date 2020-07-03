<?php

use yii\helpers\Html;

?>
<tr>
	<td><?= Yii::$app->template->fullname($model->resident) ?></td>
	<td>
		<b>From:</b> <?= date_format(date_create($model->date_from), 'F d Y, h:i:s A'); ?>
		<br> <b>To:</b> <?= date_format(date_create($model->date_to), 'F d Y, h:i:s A'); ?>
	</td>
	<td>
		<?= Yii::$app->template->reservedEntity($model, 'name') ?>
		<br>
		<label class="label label-default">
			<?= $model->type ?>
		</label>
	</td>
	<td><?= ($model->quantity) ? $model->quantity: '<label class="label label-info">N/A</label>' ?></td>
	<td><?= Yii::$app->params['status'][$model->status] ?></td>
	<td width="100">
			<?= Yii::$app->access->tableButton($model, ['template' => ['view', 'delete']]) ?>

	</td>
</tr>