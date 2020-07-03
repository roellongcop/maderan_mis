<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Position */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-form">

    <?php $form = ActiveForm::begin(); ?>

    	<div class="row">
    		<div class="col-md-6">
                <?= $form->field($model, 'type')
                    ->dropDownList(
                        ['family' => 'Family', 'official' => 'Official'],
                        ['prompt' => 'Select Type']
                    );
                ?>

	    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                
                <?php if(! $model->isNewRecord): ?>
                    <?= $form->field($model, 'status')->dropDownList(
                        ['active' => 'Active', 'In-active' => 'In-active'], 
                        ['prompt' => '']) 
                    ?>
                <?php endif ?>
                
    		</div>
    		<div class="col-md-6">
                <?= $form->field($model, 'description')->textarea(['rows' => 9]) ?>
    		</div>
    	</div>


	    <div class="form-group">
	        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>
