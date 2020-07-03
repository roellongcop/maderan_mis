

<div class="row">
    <div class="col-md-5">
        <?= $form->field($model, 'purpose')->radioList(
        	Yii::$app->params['purpose']
        ) ?>
        <?= $form->field($model, 'others')->textInput() ?>

    </div>
</div>
