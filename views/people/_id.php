<?php
use yii\helpers\Html;
?>

	<div class="col-xs-6">
		<div class="panel panel-default">
		<img width="50" height="50" src="<?= Yii::$app->request->baseUrl . '/' . Yii::$app->template->getAbout('photo') ?>" class="img-logo" style="    opacity: 0.5;
		    position: absolute;
		    left: 37%;
		    top: 26%;
		    width: 150px;
		    height: 150px;">
		    
			<div class="pull-left">
				<label>NAME : </label> <?= Yii::$app->template->fullName($model) ?> <br>
				<label>ADDRESS : </label> <?= Yii::$app->template->address($model) ?> <br>
				<label>DATE OF BIRTH : </label> <?= $model->date_of_birth ?> <br>
				<label>PLACE OF BIRTH : </label> <?= ucwords($model->place_of_birth) ?> <br>
				<label>SSS # : </label> <?= $model->sss ?> <br>
				<label>TIN # : </label> <?= $model->tin ?> <br>
			</div>
			<div class="pull-right">
				<img width="100" id="image-preview" class="img-responsive" 
				src="<?= Yii::$app->template->photo($model->photo) ?>">
			</div>

			<label>CONTACT PERSON AND CONTACT NUMBER 
				<span class="emergency-text">
					IN CASE OF EMERGENCY
				</span>
			</label> <br>
			<div class="text-center">
			<h3>
				<?= strtoupper($model->contact_person) ?> <br>
				 
			</h3>
			 <h4><?= $model->contact_no ?></h4>
			</div>
			<br><br>

			<label>
				SIGNATURE
			</label>

			<div class="pull-right">
				<p style="border-bottom: 1px solid #000;">
					<?= Yii::$app->template->official('captain') ?>
				</p>
					<label>Brgy. Captain</label>
			</div>
			<br>
			<br>
		</div>
	</div>
