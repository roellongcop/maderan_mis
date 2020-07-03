<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Role */
/* @var $form yii\widgets\ActiveForm */
$controller_actions = Yii::$app->access->controllerActions();

$src = <<<JS
    $('.check_all').on('change', function() {
        var is_checked = $(this).is(':checked');
        if(is_checked) {
            $('input[type="checkbox"]').prop('checked', true);
        }
        else {
            $('input[type="checkbox"]').prop('checked', false);
        }
    });


    $('.check_all_role').on('change', function() {
        var is_checked = $(this).is(':checked');
        if(is_checked) {
            $('input[name="Role[role_access][]"]').prop('checked', true);
        }
        else {
            $('input[name="Role[role_access][]"]').prop('checked', false);
        }
    });


    $('.controller').on('change', function() {
        var is_checked = $(this).is(':checked');
        var controller = $(this).data('controller');
        if(is_checked) {
            $('input[name="Role[access]['+controller+'][]"]').prop('checked', true);
        }
        else {
            $('input[name="Role[access]['+controller+'][]"]').prop('checked', false);
        }
    });
    
JS;
$this->registerJs($src);
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(['id' => 'role-form']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox" class="check_all_role">
                            Check All (Role Access)
                        </label>
                    </td>
                </tr>

                <?php if (($roles = \app\models\RoleSearch::dropdown()) != NULL) : ?>
                    <tr>
                        <td>
                            <?php foreach ($roles as $id => $name) : ?>
                               
                                <label>
                                    <input type="checkbox" name="Role[role_access][]" value="<?= $id ?>" <?= in_array($id, ($model->role_access) ? $model->role_access: []) ? 'checked': '' ?>>
                                    <?= $name ?>
                                </label>
                                    
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox" class="check_all">
                            Check All (Module Access)
                        </label>
                    </td>
                </tr>
                <?php foreach ($controller_actions as $controller => $actions) : ?>
                    <tr>
                        <td width="25%">
                            <label>
                                <input type="checkbox" class="controller" data-controller="<?= $controller ?>">
                                <?= $controller ?>
                            </label>
                        </td>
                        <td>
                            <?php foreach ($actions as $action) : ?>
                                <label>
                                    <input class="action" type="checkbox" name="Role[access][<?= $controller ?>][]" value="<?= $action ?>" <?= isset($model->access[$controller]) && in_array($action, $model->access[$controller]) ? 'checked': '' ?>>
                                    <?= $action ?>
                                </label>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        

    <div class="form-group">
        <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
