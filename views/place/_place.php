<?php

use yii\helpers\Html;

?>
<tr>
	<td><?= $model->name ?></td>
	<td><?= Yii::$app->template->address($model) ?></td>
	<td><?= $model->description ?></td>
	<td><?= Yii::$app->params['rentable'][$model->is_rentable] ?></td>
	<td><?= Yii::$app->params['status'][$model->status] ?></td>
	<td width="130">
        <?= Yii::$app->access->tableButton($model) ?>
	</td>
</tr>

