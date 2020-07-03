<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PeopleSearch;
use app\models\NatureOfCasesSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Blotter */
/* @var $form yii\widgets\ActiveForm */
$complainant_action = ['complainant/create'];
$respondent_action = ['respondent/create'];
$blotter_id = 0;


if (! $model->isNewRecord) {
    $blotter_id = $model->id;
    $complainant_action = ['complainant/create', 'blotter_id' => $model->id];
    $respondent_action = ['respondent/create', 'blotter_id' => $model->id];
}

$src = <<< JS
    $('.add-complainant').on('click', function() {
        $('#add-complainant-form').toggle();
        $('#complainant-form').toggle();
    });
    $('.add-respondent').on('click', function() {
        $('#add-respondent-form').toggle();
        $('#respondent-form').toggle();
    });
JS;
$this->registerJs($src);


?>
<div class="blotter-form">


    <div class="row">
        <div class="col-md-6">

            <?php $form = ActiveForm::begin(['action' => ['blotter/form'], 'options' => ['id' => 'add-complainant-form']]); ?>
                <div class="filter-box">
                    <p class="lead">Complainant</p> <hr>
                    <?= $form->field($blotter, 'name')->textInput() ?>
                    <?= $form->field($blotter, 'contact_no')->textInput() ?>
                    <?= $form->field($blotter, 'address')->textInput() ?>
                    <?= $form->field($blotter, 'type')->hiddenInput(['value' => 'complainant'])->label(false) ?>

                    <?= Html::submitButton('Add Complainant', ['class' => 'btn btn-success btn-md']) ?>
                    <span class="pull-right">
                        Resident ?  <?= Html::a('Add here!', '#', ['class' => 'add-complainant']) ?>
                    </span>
                </div>
            <?php ActiveForm::end(); ?>


                <?php $form = ActiveForm::begin(['action' => $complainant_action, 'options' => ['id' => 'complainant-form']]); ?>


                    <div class="filter-box">
                        <?= $form->field($complainant, 'user_id', ['template' => '
                            {label}
                            <div class="input-group"> 
                                {input}
                                <span class="input-group-btn">
                                    <button class="btn btn-primary">
                                        Add <i class="fa fa-plus"></i>
                                    </button> 
                                </span> 
                            </div>
                            {error}
                            '])->textInput(['list' => 'people-list', 'placeholder' => 'Control No']) 
                        ?>

                       <!--  <datalist id="people-list">
                            <?php foreach(PeopleSearch::available($blotter_id) as $name): ?>
                                <option value="<?= $name ?>"> 
                                    <?= $name ?>
                                </option>
                            <?php endforeach ?>
                        </datalist>  -->

                        <span class="pull-right">
                            Not Resident ?  <?= Html::a('Add here!', '#', ['class' => 'add-complainant']) ?>
                        </span>
                        <br>
                    </div>
                <?php ActiveForm::end(); ?>

                <div class="complainant-list">
                    <table class="table">
                        <tbody>
                            <?php foreach ($complainants as $c) : ?>
                                <?php if($c->people) : ?>
                                    <tr>
                                        <td>
                                            <b><?= $c->people->fullname ?></b>
                                            <small>
                                                <br> <i>Address: <?= strtoupper(($c->address) ? $c->address: $c->people->address) ?>
                                                <br>Contact: <?= strtoupper($c->people->mobile_no) ?></i>
                                            </small>
                                        </td>
                                        <td><br>
                                            <?php if ($model->isNewRecord) : ?>
                                                <?= Html::a('<i class="fa fa-trash"></i>', ['complainant/delete', 'id' => $c->id], [
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'data' => [
                                                        'confirm' => 'Are you sure you want to delete this '.$c->people->fullname.'?',
                                                        'method' => 'post',
                                                    ],
                                                ]) ?>
                                            <?php else: ?>
                                                <?= Html::a('<i class="fa fa-trash"></i>', [
                                                    'complainant/delete', 
                                                    'id' => $c->id,
                                                    'blotter_id' => $model->id,
                                                ], [
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'data' => [
                                                        'confirm' => 'Are you sure you want to delete this '.$c->people->fullname.'?',
                                                        'method' => 'post',
                                                    ],
                                                ]) ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-md-6">
                <?php $form = ActiveForm::begin(['action' => ['blotter/form'], 'options' => ['id' => 'add-respondent-form']]); ?>
                    <div class="filter-box">
                        <p class="lead">Respondent</p> <hr>
                        <?= $form->field($blotter, 'name')->textInput() ?>
                        <?= $form->field($blotter, 'contact_no')->textInput() ?>
                        <?= $form->field($blotter, 'address')->textInput() ?>
                        <?= $form->field($blotter, 'type')->hiddenInput(['value' => 'respondent'])->label(false) ?>

                        <?= Html::submitButton('Add Respondent', ['class' => 'btn btn-success btn-md']) ?>
                        <span class="pull-right">
                            Resident ?  <?= Html::a('Add here!', '#', ['class' => 'add-respondent']) ?>
                        </span>
                    </div>
                <?php ActiveForm::end(); ?>

                <?php $form = ActiveForm::begin(['action' => $respondent_action, 'options' => ['id' => 'respondent-form']]); ?>

                    <div class="filter-box">
                        <?= $form->field($respondent, 'user_id', ['template' => '
                        {label}
                        <div class="input-group"> 
                        {input}
                        <span class="input-group-btn">
                        <button class="btn btn-primary">
                        Add <i class="fa fa-plus"></i>
                        </button> 
                        </span>
                        </div>
                        {error}
                        '])->textInput(['list' => 'people-list',  'placeholder' => 'Control No']) 
                    ?>
                    <span class="pull-right">
                        
                    Not found ? <?= Html::a('Add here!', '#', ['class' => 'add-respondent']) ?>
                    </span>
                    <br>
                    </div>

                <?php ActiveForm::end(); ?>

                    <div class="complainant-list">
                        <table class="table">
                            <tbody>
                               <?php foreach ($respondents as $r) : ?>
                                <?php if($r->people) : ?>
                                    <tr>
                                        <td>
                                            <b><?= $r->people->fullname ?></b>
                                            <small>
                                                <br> <i>Address: <?= strtoupper(($r->address) ? $r->address: $r->people->address) ?>
                                                <br>Contact: <?= strtoupper($r->people->mobile_no) ?></i>
                                            </small>
                                        </td>
                                        <td>
                                            <br>
                                        <?php if ($model->isNewRecord) : ?>
                                            <?= Html::a('<i class="fa fa-trash"></i>', ['respondent/delete', 'id' => $r->id], [
                                                'class' => 'btn btn-danger btn-xs',
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this '.$r->people->fullname.'?',
                                                    'method' => 'post',
                                                ],
                                            ]) ?>
                                            <?php else: ?>
                                                <?= Html::a('<i class="fa fa-trash"></i>', [
                                                    'respondent/delete', 
                                                    'id' => $r->id,
                                                    'blotter_id' => $model->id,
                                                ], [
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'data' => [
                                                        'confirm' => 'Are you sure you want to delete this '.$r->people->fullname.'?',
                                                        'method' => 'post',
                                                    ],
                                                ]) ?>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr>
            <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'date_happen')->textInput([
                            'type' => 'date'
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'time_happen')->textInput([
                            'type' => 'time'
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'nature_of_case')->dropDownList(
                            NatureOfCasesSearch::dropdown(), ['prompt' => 'Select Nature of Case']
                        ) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'action_taken')->dropDownList(
                            Yii::$app->params['action_taken'], ['prompt' => 'Select Action']
                        ) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'remarks')->dropDownList(
                            Yii::$app->params['remarks'], ['prompt' => 'Select Remarks']
                        ) ?>
                    </div>

                    <div class="form-group col-md-12">
                        <hr>
                        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
                    </div>

                </div>
            <?php ActiveForm::end(); ?>
        </div>
