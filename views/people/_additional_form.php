<?php
$src = <<< JS
    $('.btn-remove-employment').on('click', function() {
        var key = $(this).data('key');
        $('.' + key).remove();
    });

    
JS;
$this->registerJs($src);
?>
<tr class="<?= $key ?>" >
    
    <td> 
        <?= $form->field($model, 'occupant['.$key.'][lname]')->textInput([
            'maxlength' => true
        ])->label('Last Name') ?>
        
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][fname]')->textInput([
            'maxlength' => true
        ])->label('First Name') ?>
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][mname]')->textInput([
            'maxlength' => true
        ])->label('Middle Name') ?>
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][family_position]')->dropDownList(
            Yii::$app->params['relationships']
        )->label('Family Position') ?>
    </td>
   
</tr>

<tr class="<?= $key ?>" >
    <td> 
        <?= $form->field($model, 'occupant['.$key.'][place_of_birth]')->textInput([
            'maxlength' => true
        ])->label('Place of Birth') ?>
        
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][sex]')->radioList([
            'male' => 'Male', 
            'female' => 'Female', 
        ])->label('Sex') ?>
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][height]')->textInput([
            'maxlength' => true
        ])->label('Height') ?>
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][weight]')->textInput([
            'maxlength' => true
        ])->label('Weight') ?>
    </td>
</tr>


<tr class="<?= $key ?>" >
    <td> 
        <?= $form->field($model, 'occupant['.$key.'][length_of_stay]')->textInput([
            'type' => 'number',
            'step' => '.01'
        ])->label('Lenght of Stay (years)') ?>
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][income]')->textInput([
            'maxlength' => true
        ])->label('Income') ?>
    </td>
</tr>



<tr class="<?= $key ?>" style="border-bottom: 2px dashed#ccc;">
    
    <td>
        <div data-age_key="<?= $key?>" ></div>
        <?= $form->field($model, 'occupant['.$key.'][date_of_birth]')->textInput([
            'type' => 'date',
        ])->label('Birth Date') ?>
    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][civil_status]')->dropDownList(
            Yii::$app->params['civil_status']
        )->label('Civil Status') ?>

    </td>
    <td>
        <?= $form->field($model, 'occupant['.$key.'][occupation]')->textInput([
            'maxlength' => true
        ])->label('Occupation') ?>
    </td>
    <td> <br> 
        <p>
            <a href="#!" class="btn btn-danger btn-sm btn-remove-employment" data-key="<?= $key ?>">
                <i class="fa fa-trash"></i>
            </a>
        </p>
    </td>
</tr>
