<?php

use yii\helpers\Html;

?>
<tr>
	<td><?= $model->username ?></td>
	<td><?= $model->roleName ?></td>
	<td><?= Yii::$app->params['status'][$model->status] ?></td>
	<td width="130">
        <?= Yii::$app->access->tableButton($model) ?>

        <?= Yii::$app->access->anchor([
        	'title' => '<i class="fa fa-dashboard"></i>',
        	'url' => ['user/dashboard', 'id' => $model->id],
        	'options' => [
        		'title' => 'User dashboard',
        		'class' => 'btn btn-warning btn-sm',
        		'data-confirm' => [
        			'Your account will be logout'
        		]
        	]
        ]) ?>
	</td>
</tr>

