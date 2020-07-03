<?php

use yii\helpers\Html;

?>
<tr>
	<td><?= ($model->people) ? $model->people->fullname: '' ?></td>
	<td><?= ($model->medicine) ? $model->medicine->name:'' ?></td>
	<td><?= ($model->medicine) ? ($model->medicine->category) ? $model->medicine->category->name: '': '' ?></td>
	<td><?= $model->quantity ?></td>
	<td><?= ($model->medicine) ? ($model->medicine->unit) ? $model->medicine->unit->name: '': '' ?></td>
	<td><?= $model->date ?></td>
	<td width="130">
        <?= Yii::$app->access->tableButton($model) ?>
	</td>
</tr>

