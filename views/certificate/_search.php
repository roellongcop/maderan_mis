<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CertificateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificate-search filter-box">
        <p class="lead">Search</p>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name') ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'control_no') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'created_at') ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
