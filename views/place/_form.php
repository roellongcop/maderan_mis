<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Block;
use app\models\Lot;
use app\models\Street;
/* @var $this yii\web\View */
/* @var $model app\models\Place */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="place-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'description')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'blk_id')
                    ->dropDownList(
                        Block::dropDown(),  
                        ['prompt' => 'Select Block']
                    );
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'lot_id')
                    ->dropDownList(
                        Lot::dropDown(),  
                        ['prompt' => 'Select Lot']
                    );
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'street_id')
                    ->dropDownList(
                        Street::dropDown(),  
                        ['prompt' => 'Select Street']
                    );
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'is_rentable')
                    ->dropDownList(
                        [1 => 'Yes', 0 => 'No'],
                        ['prompt' => 'Select']
                    );
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'rent_price')->textInput() ?>
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
            <div class="col-md-4">
                <?= $form->field($model, 'image')->fileInput(['class' => 'image-input']) ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <img id="image-preview" class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/' . $model->photo ?>">
            </div>
        </div>


        <div class="row"> <br><br>
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
