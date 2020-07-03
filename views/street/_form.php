<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Block;

/* @var $this yii\web\View */
/* @var $model app\models\Street */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="street-form">

    <?php $form = ActiveForm::begin(); ?>

	    <div class="row">
    		<div class="col-md-4">
    			<?= $form->field($model, 'block_id')
			        ->dropDownList(
			            Block::dropDown(),  
			            ['prompt' => 'Select Block']
			        );
			    ?>
    		</div>
    		<div class="col-md-4">
	    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class="col-md-4">
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
