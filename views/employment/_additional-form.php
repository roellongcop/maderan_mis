<?php
$src = <<< JS
    $('.btn-remove-employment').on('click', function() {
        var key = $(this).data('key');
        $('#' + key).remove();
    });
JS;
$this->registerJs($src);
?>
<div class="row" id="<?= $key ?>">
    <div class="col-md-4"> 
        <?= $form->field($model, '['.$key.']company_name')->textInput([
            'maxlength' => true
        ]) ?>
        
    </div>
    <div class="col-md-3">
        <?= $form->field($model, '['.$key.']address')->textInput() ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, '['.$key.']duration_from')->textInput([
            'type' => 'date'
        ]) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, '['.$key.']duration_to')->textInput([
            'type' => 'date'
        ]) ?>
    </div>
    <div class="col-md-1"> <br> 
        <p>
            <a href="#!" class="btn btn-danger btn-sm btn-remove-employment" data-key="<?= $key ?>">
                <i class="fa fa-trash"></i>
            </a>
        </p>
    </div>
</div> 