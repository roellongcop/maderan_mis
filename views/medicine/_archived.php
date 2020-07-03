<?php

use yii\helpers\Html;
$medicine = $model->medicine;
?>

<tr>
	<td><?= $medicine->name ?></td>
	<td><?= ($medicine->category) ? $medicine->category->name: '' ?></td>
	<td><?= $model->quantity ?> </td>
	<td><?= $medicine->unit->name ?></td>
	<td><?= $medicine->expiration_date ?> </td>
	<td><?= $model->reason ?> </td>
	<td width="130">
    	<?php if(Yii::$app->access->user_can('restore')): ?>
    		<?= Html::a('<i class="fa fa-arrow-left"></i>', ['restore', 'id' => $model->id], [
    			'class' => 'btn btn-warning btn-sm',
    			'title' => 'Restore'
    		]) ?>

    	<?php endif; ?>
	</td>
</tr>
