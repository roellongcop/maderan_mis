<?php 
$model->business_foreclosed = date('m/d/Y', strtotime($model->business_foreclosed));
?>

<div class="row">
    <div class="col-md-5">
        <?= $form->field($model, 'business_name')->textInput([
        	'maxlength' => true
        ]) ?>

         <?= $form->field($model, 'business_address')->textarea([
        	'rows' => 6
        ]) ?>

        <?= $form->field($model, 'business_foreclosed')->textInput([
            'class' => 'form-control dpicker',
            // 'type' => 'date'
        ]) ?>


    </div>
</div>
