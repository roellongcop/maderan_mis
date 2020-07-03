<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MedicineSearch;
use app\models\PeopleSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Distribution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribution-form">

  

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-5">
                <?= $form->field($model, 'people_id')->dropDownList(
                    PeopleSearch::lists(), [
                        'class' => 'form-control select2'
                    ]
                ) ?>
                <?= $form->field($model, 'medicine_id')->dropDownList(
                    MedicineSearch::lists(true), [
                        'class' => 'form-control select2'
                    ]
                ) ?>

                Available (<?= number_format($medicine->quantity) + $model->quantity ?>)
                <?= $form->field($model, 'quantity')->textInput([
                    'min' => 1,
                    'max' => $medicine->quantity + $model->quantity
                ]) ?>
                <?= $form->field($model, 'date')->textInput([
                    'type' => 'date',
                    'class' => 'form-control dpicker'
                ]) ?>
            </div>
        </div>


    <div class="form-group">
        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
