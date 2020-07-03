
<?php 
use app\models\People;
?>

<div class="row">
    <div class="col-md-5">

       	<?= $form->field($model, 'partner_id')->dropDownList(
            People::dropDown(),
            ['prompt' => 'Select Partner']
        )?>

        <?= $form->field($model, 'living_together')->textInput([
            'maxlength' => true
        ]) ?>



        <?php if($model->people): ?>
            <div class="siblings-div">
                <label>Siblings</label>
                <?= $this->render('/people/_siblings', [
                    'model' => $model->people
                ]) ?>
            </div>
        <?php endif; ?>
    </div>

  
</div>
