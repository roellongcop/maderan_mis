

<div class="row">
    <div class="col-md-5">
        <?= $form->field($model, 'business_name')->textInput([
        	'maxlength' => true
        ]) ?>

         <?= $form->field($model, 'business_address')->textarea([
        	'rows' => 6
        ]) ?>

    </div>
</div>
