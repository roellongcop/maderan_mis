<?php 
use app\models\People;
$model->child_born = date('m/d/Y', strtotime($model->child_born));
?>

<div class="row">
    <div class="col-md-5">
        <?= $form->field($model, 'child_name')->textInput([
        	'maxlength' => true
        ]) ?>

        <?= $form->field($model, 'child_born')->textInput([
            'class' => 'form-control dpicker' 
        ]) ?>

        <?= $form->field($model, 'child_relationship')->radioList([
        	'son' => 'Son',
        	'daughter' => 'Daughter'
        ]) ?>

        <?= $form->field($model, 'partner_id')->dropDownList(
            People::dropDown(),
            ['prompt' => 'Select Partner']
        )?>

    </div>
</div>
