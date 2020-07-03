<?php
$model->resident_since = date('m/d/Y', strtotime($model->resident_since));
?>

<div class="row">
    <div class="col-md-5">

    	<?= $form->field($model, 'resident_since')->textInput([
        	'class' => 'form-control dpicker'
        ]) ?>
        
        <?= $form->field($model, 'purpose')->radioList(
        	Yii::$app->params['purpose']
        ) ?>
        <?= $form->field($model, 'others')->textInput() ?>

    </div>
</div>
