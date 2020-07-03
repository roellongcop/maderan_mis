<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeopleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ($this->context->action->id == 'index') ? 'List of Peoples | Resident': 'List of People | Archive';
$this->params['page'] = 'Peoples';
$this->params['breadcrumbs'][] = $this->title;

$create_link = ($this->context->action->id == 'index') ? ['people/create']: ['people/create-test', 'is_resident' => 0];
$print_link = ($this->context->action->id == 'index') ? ['people/print-resident']: ['people/print-not-resident'];

$access = Yii::$app->access;

?>
<div class="people-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= $access->anchor([
        'title' => 'Add Resident',
        'url' => $create_link,
        'options' => ['class' => 'btn btn-success']
    ]) ?>

    <?= $access->anchor([
        'title' => 'Print',
        'url' => $print_link,
        'options' => ['class' => 'btn btn-primary', 'target' => '_blank']
    ]) ?>


    <br> <br>

    <table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>control no</th>
                <th>FULLNAME</th>
                <th>ADDRESS</th>
                <th>AGE</th>
                <th>SEX</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_people',
                'viewParams' => ['with_action' => TRUE]
            ]) ?>
        </tbody>
    </table>
</div>

