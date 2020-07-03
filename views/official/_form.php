<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Position;
use app\models\People;

/* @var $this yii\web\View */
/* @var $model app\models\Official */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="official-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-5">
                <?= $form->field($model, 'people_id')
                    ->dropDownList(
                        People::fetch(),  
                        [
                            'prompt' => 'Select Resident',
                            'class' => 'form-control select2'
                        ]
                    );
                ?>


                <?= $form->field($model, 'position')
                    ->dropDownList(
                        Yii::$app->params['position']['official'],  
                        [
                            'prompt' => 'Select Position',
                            'class' => 'form-control select2'
                        ]
                    );
                ?>
                <?php if(! $model->isNewRecord): ?>
                    <?= $form->field($model, 'status')->dropDownList(
                        ['active' => 'Active', 'In-active' => 'In-active'], 
                        [
                            'prompt' => '',
                            'class' => 'form-control select2'
                        ]
                    ) 
                    ?>
                <?php endif ?>

                <div class="form-group">
                    <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
