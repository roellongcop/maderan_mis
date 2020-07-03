<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    	<div class="row">
    		<div class="col-md-6">
	    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?php if(! $model->isNewRecord): ?>
                    <?= $form->field($model, 'status')->dropDownList(
                        ['active' => 'Active', 'In-active' => 'In-active'], 
                        ['prompt' => '']) 
                    ?>
                <?php endif ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'image')->fileInput(['class' => 'image-input']) ?>
    		</div>
    		<div class="col-md-6">
                <img id="image-preview" class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/' . $model->photo ?>">
    		</div>
    	</div>



    <div class="form-group">
        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

