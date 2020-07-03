<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    	<div class="col-md-7">
		    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		    <?= $form->field($model, 'image')->fileInput(['class' => 'image-input']) ?>
	    </div>
    	<div class="col-md-5">
    		<img id="image-preview" class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/' . $model->photo ?>">
	    </div>

    	<div class="col-md-12">
		    <div class="form-group">
		        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
		    </div>
	    </div>

    <?php ActiveForm::end(); ?>

</div>

