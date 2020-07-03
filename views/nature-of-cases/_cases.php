<?php

use yii\helpers\Html;

?>
<tr>
	<td><?= $model->name ?></td>
	<td><?= $model->description ?></td>
	<td width="130">
        <?= Yii::$app->access->tableButton($model) ?>
	</td>
</tr>