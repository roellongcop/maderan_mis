<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Image */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-form">

    <?php $form = ActiveForm::begin(); ?>

    	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	    <?= $form->field($model, 'path')->textarea(['rows' => 6]) ?>

	    <div class="form-group">
	        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>
