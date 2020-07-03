<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\People;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificate-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-5">

                <?php if(! $model->isNewRecord): ?>
                    <input type="hidden" id="certificate-id" class="form-control" name="Certificate[id]" value="<?= $model->id ?>">
                <?php endif; ?>

                <?= $form->field($model, 'name')->dropDownList(
                    Yii::$app->params['certificates']
                ) ?>

                <?= $form->field($model, 'user_id')->dropDownList(
                    People::fetch(),  
                    ['prompt' => 'Select Resident', 'class' => 'form-control select2']
                )?>

                
                <?= Html::a('Not found ? Add here!', ['people/create'], ['target' => '_blank']) ?>


            </div>
        </div>
   
        <div id="additional-inputs"> </div>

        <hr>
        <div class="form-group">
            <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
