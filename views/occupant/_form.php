<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PeopleSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Occupant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="occupant-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-5">
    		<label>Fullname</label> <br>
		    <?= $model->occupantPeople->fullname ?> <br><br>

		    <?= $form->field($model, 'type')->dropDownList(
		        Yii::$app->params['relationships']
		    ) ?>

		    <div class="form-group">
		        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
		    </div>
    	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
