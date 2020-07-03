<?php

use yii\helpers\Html;

?>
<?php if(date('Y-m-d') < date('Y-m-d', strtotime($model->expiration_date))): ?>

	<tr style="<?= ($model->quantity == 0 )? 'background-color: #f8a7a7': '' ?>">
		<td><?= $model->name ?></td>
		<td><?= ($model->category) ? $model->category->name: '' ?></td>
		<td><?= $model->quantity ?> </td>
		<td><?= $model->unit->name ?></td>
		<td><?= $model->expiration_date ?> </td>
		<td width="170">
        	<?= Yii::$app->access->tableButton($model) ?>
        	<?php if(Yii::$app->access->user_can('move-to-archived')): ?>
        		<?= Html::a('<i class="fa fa-arrow-right"></i>', ['move-to-archived', 'id' => $model->id], [
        			'class' => 'btn btn-warning btn-sm',
        			'title' => 'Move to Archived'
        		]) ?>

        	<?php endif; ?>
		</td>
	</tr>
<?php endif ?>
