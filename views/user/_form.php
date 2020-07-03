<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-5">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> 

                <?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true]) ?> 

                <?= $form->field($model, 'role_id')
                    ->dropDownList(
                        \app\models\RoleSearch::dropdown(TRUE, Yii::$app->user->identity->role->role_access),
                        ['prompt' => 'Select Usertype']
                    );
                ?>
            </div>
        </div>

    

    <div class="form-group">
       
        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
