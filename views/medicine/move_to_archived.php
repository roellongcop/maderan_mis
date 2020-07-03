<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'Move to Archived: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medicines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['page'] = 'Medicines';
?>
<div class="medicine-update"> 

     <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($archived, 'quantity')->textInput(['type' => 'number']) ?>

                <?= $form->field($archived, 'reason')->textInput(['list' => 'archive_reason_list']) ?>

                <datalist id="archive_reason_list">
                	<?php foreach (Yii::$app->params['archive_reason'] as $ar) : ?>
                		<option value="<?= $ar ?>">
                	<?php endforeach; ?>
                </datalist>
            </div>
        </div>  
        <div class="form-group">
            <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($archived->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
