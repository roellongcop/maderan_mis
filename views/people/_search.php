<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\People;
use app\models\Block;
use app\models\Lot;
use app\models\Street;
/* @var $this yii\web\View */
/* @var $model app\models\PeopleSearch */
/* @var $form yii\widgets\ActiveForm */
$action = isset($action) ? $action : 'index';

?>

<div class="people-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>
    <div class="filter-box">
        <p class="lead">Search</p>
         
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'keyword')
                    ->textInput(['placeholder' => 'Search by control no', 'onchange' => '$(form).submit()'])
                    ->label('Control No') 
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'status')
                    ->dropDownList(
                        [
                            'active' => 'Active',
                            'In-active' => 'In-active'
                        ],
                        [
                            'prompt' => 'Filter by status'
                        ]
                    );
                ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'age')
                    ->textInput();
                ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'height')
                    ->textInput();
                ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'weight')
                    ->textInput();
                ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'sex')
                     ->dropDownList(
                        [
                            'male' => 'Male',
                            'female' => 'Female',
                        ],
                        [
                            'prompt' => 'Filter by sex'
                        ]
                    );
                ?>
            </div>

            <div class="col-md-2">
                <?= $form->field($model, 'blk_id')
                    ->textInput();
                ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'lot_id')
                    ->textInput();
                ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'street_id')
                    ->textInput();
                ?>
            </div>
        </div> 
    </div>


    <?php ActiveForm::end(); ?>

</div> <hr>
