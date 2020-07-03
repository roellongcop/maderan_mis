<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */

$this->title = Yii::$app->template->fullname($model->resident);
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Reservations';
$access = Yii::$app->access;

?>
<div class="reservation-view"> 

    <p>
        <?php if($model->status == 'reserved'): ?>
            <?= $access->anchor([
                'title' => 'Return',
                'url' => ['reservation/return', 'id' => $model->id],
                'options' => ['class' => 'btn btn-primary']
            ]) ?>
        <?php endif; ?>
        <?= $access->button('delete', ['model' => $model]) ?>
    </p>
    <br>

    <?= $this->render('_detail', ['model' => $model]) ?>

</div>
