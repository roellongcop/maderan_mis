<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */

$src = <<< JS
$('.field-equipment-rent_price').hide();
$('#equipment-is_rentable').on('change', function() {
    if($(this).val() == 1) {
        $('.field-equipment-rent_price').show();
    }
    else {
        $('.field-equipment-rent_price').hide();
        $('#equipment-rent_price').val(0);
    }
})
JS;
$this->registerJs($src);
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'category_id')
                    ->radioList(
                        Category::dropDown()
                    );
                ?>
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
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'quantity')
                    ->textInput() ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'unit_id')
                    ->dropDownList(
                        Unit::dropDown(),  
                        ['prompt' => '']
                    );
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'is_rentable')
                    ->dropDownList(
                        [1 => 'Yes', 0 => 'No'],
                        ['prompt' => '']
                    );
                ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'rent_price')->textInput(['type' => 'number']) ?>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'description')->textInput() ?>
            </div>
        </div>
    

 
    

    <div class="form-group">
        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
