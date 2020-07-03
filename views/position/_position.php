<?php

use yii\helpers\Html;

?>
<tr>
	<td><?= $model->name ?></td>
	<td><?= $model->description ?></td>
	<td><?= $model->type ?></td>
	<td><?= Yii::$app->params['status'][$model->status] ?></td>
	<td width="130">
		<?= Html::a('<i class="fa fa-th-large"></i>', 
			['view', 'id' => $model->id], 
			['class' => 'btn btn-info btn-sm']) 
		?>
		<?= Html::a('<i class="fa fa-edit"></i>', 
			['update', 'id' => $model->id], 
			['class' => 'btn btn-primary btn-sm']) 
		?>
		<?= Html::a('<i class="fa fa-trash"></i>', 
		 	['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
	</td>
</tr>

