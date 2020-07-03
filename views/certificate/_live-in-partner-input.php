
<?php 
use app\models\People;
$model->partner_since = date('m/d/Y', strtotime($model->partner_since));
?>

<div class="row">
    <div class="col-md-5">
        <?= $form->field($model, 'partner_id')->dropDownList(
            People::dropDown(),
            ['prompt' => 'Select Partner']
        )?>
        
        <?= $form->field($model, 'partner_since')->textInput([
            'class' => 'form-control dpicker' 
        ]) ?>

        <?= $form->field($model, 'purpose')->radioList(
            Yii::$app->params['purpose']
        ) ?>
        <?= $form->field($model, 'others')->textInput() ?>


       	

    </div>
</div>
