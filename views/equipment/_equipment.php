<?php

use yii\helpers\Html;

?>
<tr style="<?= ($model->quantity == 0)? 'background-color: #f8a7a7': '' ?>">
	<td><?= $model->name ?></td>
	<td><?= $model->description ?></td>
	<td><?= ($model->category) ? $model->category->name: '' ?></td>
	<td><?= $model->quantity ?></td>
	<td><?= $model->unit->name ?></td>
	<td><?= Yii::$app->params['rentable'][$model->is_rentable] ?></td>
	<td class="text-right"> <?= number_format($model->rent_price, 2) ?></td>
	<td><?= Yii::$app->params['status'][$model->status] ?></td>
	<td width="130">
        <?= Yii::$app->access->tableButton($model) ?>
	</td>
</tr>

