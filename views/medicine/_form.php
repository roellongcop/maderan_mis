<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'category_id')
                    ->dropDownList(
                        Category::dropDown('medicine'),  
                        ['prompt' => 'Select Category']
                    );
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?php $model->expiration_date = date('m/d/Y', strtotime($model->expiration_date)) ?>

                <?= $form->field($model, 'expiration_date')->textInput([
                    'class' => 'form-control dpicker',
                ]) ?>
            </div>
        </div>


         <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'unit_id')
                    ->dropDownList(
                        Unit::dropDown(),  
                        ['prompt' => 'Select Unit']
                    );
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?php if(! $model->isNewRecord): ?>
                    <?= $form->field($model, 'status')
                        ->dropDownList(
                            ['active' => 'active', 'In-active' => 'In-active'],
                            ['prompt' => 'Select Status']
                        );
                    ?>
                <?php endif ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
