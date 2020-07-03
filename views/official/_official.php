<?php

use yii\helpers\Html;

?>
<tr>
	<td>
		<?= Yii::$app->template->fullName($model->people) ?>
	</td>
	<td><?= ($model->position) ? $model->_position: '' ?></td>
	<td><?= Yii::$app->params['status'][$model->status] ?></td>
	<td width="130">
		<?= Yii::$app->access->tableButton($model) ?>
	</td>
</tr>