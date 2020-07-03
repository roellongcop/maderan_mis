<?php

use yii\helpers\Html;

?>
<tr>
	<td><?= $model->blk_no ?></td>
	<td><?= $model->description ?></td>
	<td><?= Yii::$app->params['status'][$model->status] ?></td>
	<td width="130">
        <?= Yii::$app->access->tableButton($model) ?>
	</td>
</tr>

