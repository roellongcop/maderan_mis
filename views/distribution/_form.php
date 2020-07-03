<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MedicineSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Distribution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribution-form">

    <?php $form = ActiveForm::begin(['method' => 'GET', 'action' => ['create']]); ?>
      
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'search')->textInput([
                    'placeholder' => 'Control no'
                ]) ?>
            </div>
            <div class="col-md-1"> <br>
                <?= Html::submitButton('Search', ['class' => 'btn btn-info']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>


    <?php $form = ActiveForm::begin(); ?>

        <?php if($model->search): ?>
            <?php if($peoples) : ?>
                <div class="filter-box">
                    You've searched for "<?= $model->search ?>"
                    <table class="table table-bordered">
                        <thead>
                            <th>FULLNAME</th>
                            <th>ADDRESS</th>
                            <th>CONTACT</th>
                        </thead>
                        <tbody>
                            <?php foreach ($peoples as $people) : ?>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" name="people[]" value="<?= $people->id ?>">
                                            <?= $people->fullname ?>
                                        </label>
                                    </td>
                                    <td><?= $people->address ?></td>
                                    <td><?= $people->mobile_no ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            <?php else: ?>
                <div class="filter-box">
                    You've searched for "<?= $model->search ?>" <br>
                    No data Found
                </div>
            <?php endif ?>
        <?php endif ?>

        <br>

        <p class="lead">Medicine</p>
        <table class="table-bordered table ">
            <thead>
                <th>NAME</th>
                <th>CATEGORY</th>
                <th>QUANTITY</th>
                <th>EXPIRATION DATE</th>
                <th>HOW MANY</th>
            </thead>
            <tbody>
                <?php if(($medicines = MedicineSearch::lists()) != NULL): ?>
                    <?php foreach ($medicines as $medicine) : ?>
                        <tr>
                            <td><?= $medicine->name ?></td>
                            <td><?= $medicine->category->name ?></td>
                            <td><?= $medicine->quantity ?></td>
                            <td><?= $medicine->expiration_date ?></td>
                            <td>
                                <input class="form-control" min="1" max="<?= $medicine->quantity ?>" type="number" name="quantity[<?= $medicine->id ?>]">
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

            </tbody>
        </table>


    <div class="form-group">
        <?php if($model->isNewRecord): ?>
            <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?php else: ?>
            <?= Html::a('Cancel', ['distribution/cancel', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
        <?php endif; ?>

        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
