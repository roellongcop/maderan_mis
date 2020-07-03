<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Block */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="block-form">

    <?php $form = ActiveForm::begin(); ?>
    	<div class="row">
    		<div class="col-md-6">
	    		<?= $form->field($model, 'blk_no')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class="col-md-6">
    			<?php if(! $model->isNewRecord): ?>
                    <?= $form->field($model, 'status')->dropDownList(
                        ['active' => 'Active', 'In-active' => 'In-active'], 
                        ['prompt' => '']) 
                    ?>
                <?php endif ?>
    		</div>
    	</div>

	    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	    

    <div class="form-group">
        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
