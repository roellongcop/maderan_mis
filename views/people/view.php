<?php

use yii\helpers\Html;
use yii\widgets\DetailView; 

/* @var $this yii\web\View */
/* @var $model app\models\People */

$this->title = Yii::$app->template->fullName($model);
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Peoples';
?>
<div class="people-view">


    <p>
        <?= Yii::$app->access->button(['update', 'delete'], ['model' => $model]) ?>
    </p>
     <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="office-title">PERSONAL INFORMATION</h3>
            
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td rowspan="7" width="150" class="text-center">
                            <img width="150" id="image-preview" class="img-responsive" src="<?= Yii::$app->template->photo($model->photo) ?>">
                            <label class="label label-info"><?= $model->_is_resident ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th>Control No</th>
                        <td colspan="5"><?= $model->control_no ?></td>
                    </tr>
                    <tr>
                        <th>FULLNAME</th>
                        <td><?= Yii::$app->template->fullName($model) ?></td>
                        <th>MOBILE NUMBER</th>
                        <td><?= $model->mobile_no ?></td>
                        <th>SSS NUMBER</th>
                        <td><?= $model->sss ?></td>
                    </tr>
                    <tr>
                        <th>ADDRESS</th>
                        <td><?= Yii::$app->template->address($model) ?></td>
                        <th>EMAIL</th>
                        <td><?= $model->email ?></td>
                        <th>TIN NUMBER</th>
                        <td><?= $model->tin ?></td>
                    </tr>
                    <tr>
                        <th>AGE</th>
                        <td><?= $model->age ?></td>
                        <th>BIRTHDAY</th>
                        <td><?= date('F d, Y', strtotime($model->date_of_birth)) ?></td>
                        <th>CONTACT PERSON</th>
                        <td><?= ucwords($model->contact_person . ' | ' . $model->relationship) ?></td>
                    </tr>
                    <tr>
                        <th>SEX</th>
                        <td><?= $model->sex ?></td>
                        <th>BIRTH PLACE</th>
                        <td><?= ucwords($model->place_of_birth) ?></td>
                        <th>CONTACT NUMBER</th>
                        <td><?= $model->contact_no ?></td>
                    </tr>

                    <tr>
                        <th>HEIGHT</th>
                        <td><?= $model->height ?> cm</td>
                        <th>WEIGHT</th>
                        <td><?= $model->weight ?> kg</td>
                        <th>LENGTH OF STAY</th>
                        <td><?= $model->length_of_stay ?></td>
                    </tr>
                    <tr>
                        <th>INCOME</th>
                        <td><?= number_format($model->income, 2) ?></td>
                        <th>SPOUSE</th>
                        <td colspan="2"><?= ($model->spouse) ? $model->spouse->fullname: '' ?></td>
                        <th>religion</th>
                        <td><?= $model->religion ?> </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>

     <hr>

    <div class="row">
        <div class="col-md-12">
            <h3 class="office-title">RESERVATIONS</h3>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th colspan="3" class="text-center">
                            RESERVED EQUIPMENTS
                        </th>
                    </tr>
                    <tr>
                        <th>FROM </th>
                        <th>TO</th>
                        <th>ENTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $this->render('_reservation', ['reservations' => $equipments]) ?>
                </tbody>
            </table>

             
        </div>

        <div class="col-md-6">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th colspan="3" class="text-center">
                            RESERVED PLACES
                        </th>
                    </tr>
                    <tr>
                        <th>FROM </th>
                        <th>TO</th>
                        <th>ENTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $this->render('_reservation', ['reservations' => $places]) ?>
                </tbody>
            </table>
        </div>

    </div>


    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="office-title">CERTIFICATES</h3>
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th> CERTIFICATE NAME </th>
                        <th> ISSUED ON </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($model->certificates) : ?>
                        <?php foreach ($model->certificates as $key => $certificate) : ?>
                            <tr>
                                <td><?= Html::a($certificate->_name, ['certificate/view', 'id' => $certificate->id]) ?></td>
                                <td><?= $certificate->created_at ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>


    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="office-title">OCCUPANTS</h3>
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th> FULLNAME </th>
                        <th> RELATION </th>
                        <th> AGE </th>
                        <th> BIRTHDAY </th>
                        <th> OCCUPATION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($model->occupants) : ?>
                        <?php foreach ($model->occupants as $key => $occupant) : ?>
                            <tr>
                                <td>
                                    <?= Yii::$app->access->anchor([
                                        'title' =>  $occupant->occupantPeople->fullname,
                                        'url' => ['people/view', 'id' => $occupant->occupant_id],
                                        'options' => ['target' => '_blank']
                                    ]) ?>
                                </td>
                                <td><?= $occupant->type ?></td>
                                <td><?= $occupant->occupantPeople->age ?></td>
                                <td><?= $occupant->occupantPeople->date_of_birth ?></td>
                                <td><?= $occupant->occupantPeople->occupation ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

   
    <hr>

    <div class="row">
        <div class="col-md-12">
            <h3 class="office-title">EMPLOYMENT HISTORY</h3>
                <?php if(($employments = $model->employments) != NULL): ?>
                    <table class="table table-bordered ">
                        <thead>
                            <th>COMPANY NAME</th>
                            <th>ADDRESS</th>
                            <th>FROM</th>
                            <th>TO</th>
                        </thead>
                        <tbody>
                            <?php foreach ($employments as $employment): ?>
                                <tr>
                                    <td><?= $employment->company_name ?></td>
                                    <td><?= $employment->address ?></td>
                                    <td><?= $employment->duration_from ?></td>
                                    <td><?= $employment->duration_to ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    No Employment History
                <?php endif; ?>
        </div>
    </div>


     <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="office-title">BLOTTER RECORDS AS COMPLAINANT</h3>
                <?php if($model->blotters): ?>

                    <table class="table table-bordered table-striped data">
                        <thead>
                            <tr>
                                <th>CASE #</th>
                                <th>COMPLAINANTS</th> 
                                <th>ACCUSE</th>
                                <th>NATURE OF CASE</th>
                                <th>ACTION TAKEN</th>
                                <th>REMARKS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->blotters as $blotter): ?>
                                <?= $this->render('/blotter/_blotter', ['model' => $blotter])  ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                <?php else: ?>
                    No Blotters as Complainant Found
                <?php endif; ?>
        </div>
    </div>



     <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="office-title">BLOTTER RECORDS AS ACCUSE</h3>
                <?php if($model->blottersAsRespondent): ?>

                    <table class="table table-bordered table-striped data">
                        <thead>
                            <tr>
                                <th>CASE #</th>
                                <th>COMPLAINANTS</th> 
                                <th>ACCUSED</th>
                                <th>NATURE OF CASE</th>
                                <th>ACTION TAKEN</th>
                                <th>REMARKS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->blottersAsRespondent as $blotter): ?>
                                <?= $this->render('/blotter/_blotter', ['model' => $blotter])  ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                <?php else: ?>
                    No Blotters as Accuse Found
                <?php endif; ?>
        </div>
    </div>

</div>
