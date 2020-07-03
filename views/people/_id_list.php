<?php

use yii\helpers\Html;

?>

<?php if (isset($issued) && $issued == true) : ?>
	<?php if ($model->date_id_issued != '0000-00-00') : ?>
		<tr>
			<td>
				<?= Yii::$app->template->fullName($model) ?>
			</td>
			<td><?= $model->date_id_issued ?></td>
			<td><?= $model->age ?></td>
			<td><?= $model->sex ?></td>
				<?php if(isset($with_action) && $with_action == TRUE): ?>
				<td>
					<?= isset(Yii::$app->params['status'][$model->status]) ? Yii::$app->params['status'][$model->status]: '' ?>
				</td>
				<?php endif;  ?>

				<?php if(! isset($no_print)): ?>
					<td width="130">
						<?= Yii::$app->access->anchor([
							'title' => 'Print',
							'url' => ['people/print-id', 'id' => $model->id],
							'options' => ['class' => 'btn btn-success btn-sm', 'target' => '_blank']
						]) ?>
					</td>
				<?php endif;  ?>
		</tr>
	<?php endif ?>
	<?php else: ?>
		<?php if ($model->date_id_issued == '0000-00-00') : ?>
		<tr>
			<td>
				<?= Yii::$app->template->fullName($model) ?>
			</td>
			<td>N/A</td>
			<td><?= $model->age ?></td>
			<td><?= $model->sex ?></td>
				<?php if(isset($with_action) && $with_action == TRUE): ?>
				<td>
					<?= isset(Yii::$app->params['status'][$model->status]) ? Yii::$app->params['status'][$model->status]: '' ?>
				</td>
				<?php endif;  ?>
				<td width="130">
					<?= Yii::$app->access->anchor([
						'title' => 'Print',
						'url' => ['people/print-id', 'id' => $model->id],
						'options' => ['class' => 'btn btn-success btn-sm', 'target' => '_blank']
					]) ?>
				</td>
		</tr>
	<?php endif ?>
<?php endif ?>
