<?php

use yii\helpers\Html;
$access = Yii::$app->access;

?>
<?php if(isset($detailsOnly)): ?>

	<table class="table table-bordered">
		<tbody>
			<tr>
				<td rowspan="5" width="150">
					<img width="150" id="image-preview" class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/' . $model->photo ?>">
				</td>
			</tr>
			<tr>
				<th>FULLNAME</th>
				<td><?= Yii::$app->template->fullName($model) ?></td>
				<th>MOBILE NUMBER</th>
				<td><?= $model->mobile_no ?></td>
				<th>SSS NUMBER</th>
				<td><?= $model->sss ?></td>
			</tr>
			<tr>
				<th>ADDRESS</th>
				<td><?= Yii::$app->template->address($model) ?></td>
				<th>EMAIL</th>
				<td><?= $model->email ?></td>
				<th>TIN NUMBER</th>
				<td><?= $model->tin ?></td>
			</tr>
			<tr>
				<th>AGE</th>
				<td><?= $model->age ?></td>
				<th>BIRTHDAY</th>
				<td><?= date('F d, Y', strtotime($model->date_of_birth)) ?></td>
				<th>CONTACT PERSON</th>
				<td><?= ucwords($model->contact_person . ' | ' . $model->relationship) ?></td>
			</tr>
			<tr>
				<th>SEX</th>
				<td><?= $model->sex ?></td>
				<th>BIRTH PLACE</th>
				<td><?= ucwords($model->place_of_birth) ?></td>
				<th>CONTACT NUMBER</th>
				<td><?= $model->contact_no ?></td>
			</tr>


		</tbody>
	</table> 

<?php else:  ?>
<tr>
	<td><?= $model->control_no ?></td>
	<td>
		<?= Yii::$app->template->fullName($model) ?>
	</td>
	<td><?= Yii::$app->template->address($model) ?></td>
	<td><?= $model->age ?></td>
	<td><?= $model->sex ?></td>
		<?php if(isset($with_action) && $with_action == TRUE): ?>
		<td>
			<?= isset(Yii::$app->params['status'][$model->status]) ? Yii::$app->params['status'][$model->status]: '' ?>
		</td>
		<?php endif;  ?>
	<?php if(isset($with_action) && $with_action == TRUE): ?>
		<td width="130">
			<?= $access->tableButton($model) ?>
		</td>
	<?php endif;  ?>
</tr>

<?php endif;  ?>
