<?php

use yii\helpers\Html;

?>
<tr>
    <td><?= $model->case_no ?></td>
    <td><?= $model->complainantList ?></td>
    <td><?= $model->respondentList ?></td>
    <td><?= $model->_nature_of_case ?></td>
    <td><?= $model->_action_taken ?></td>
    <td><?= $model->_remarks ?></td>
    <td width="130">
        <?= Yii::$app->access->tableButton($model) ?>
    </td>
</tr>

