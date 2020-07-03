<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Position;
use app\models\Block;
use app\models\Lot;
use app\models\Street;
/* @var $this yii\web\View */
/* @var $model app\models\People */
/* @var $form yii\widgets\ActiveForm */

$model->date_of_birth = date('m/d/Y', strtotime($model->date_of_birth));

$src = <<< JS
    $('#people-civil_status').on('change', function() {
        var value = $(this).val();

        if(value == 'married') {
            $('.spouse-list').show();
        }
    });


    $('.btn-add-employment').on('click', function() {
        $.ajax({
            url: base_url + 'employment/form',
            dataType: 'html',
            success: function(res) {
                $('.employment-record').prepend(res)
            }
        });
    });

    $('.btn-add-occupant').on('click', function() {
        $.ajax({
        url: base_url + 'people/form',
            dataType: 'html',
            success: function(res) {
                $('.tbody-occupant').prepend(res)
            }
        });
    });

    


    $('#people-family_position').on('change', function() {
        var position = $(this).val();

        if(position == 'parent') {
            $('.position-label').html('Select Children');
        }
        else if(position == 'child') {
            $('.position-label').html('Select Parent');
        }
        $('.resident-list').show();
    });

    
JS;
$this->registerJs($src);
?>

<div class="people-form">
   



    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#personal-information">Personal Information</a>
            </li>
            <li><a data-toggle="tab" href="#occupants">House Occupants</a></li>
            <li><a data-toggle="tab" href="#employment-record">Employment Record</a></li>
            <li><a data-toggle="tab" href="#address">Address</a></li>
            <li><a data-toggle="tab" href="#contact-details">Contact Details</a></li>
            <li><a data-toggle="tab" href="#other-details">Other Details</a></li>
        </ul>
        <div class="tab-content">
            <div id="personal-information" class="tab-pane fade in active">
                <div class="personal-information">

                    <!-- <?= $form->field($model, 'is_resident')->checkbox() ?> -->

                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'mname')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4"> 
                            <?= $form->field($model, 'date_of_birth')->textInput(['class' => 'form-control dpicker']) ?>
                            
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'place_of_birth')->textInput() ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'sex')->radioList([
                                'male' => 'Male', 
                                'female' => 'Female', 
                            ])?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"> 
                            <?= $form->field($model, 'height')->textInput([
                                'maxlength' => true
                            ]) ?>
                            
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'weight')->textInput([
                                'maxlength' => true
                            ]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'length_of_stay')->textInput() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"> 
                            <?= $form->field($model, 'income')->textInput([
                                'maxlength' => true
                            ]) ?>
                        </div>
                        <div class="col-md-4"> 
                            <?= $form->field($model, 'religion')->textInput([
                                'maxlength' => true
                            ]) ?>
                        </div>
                        
                    </div>



                    <div class="row"> 
                        <div class="col-md-4">
                            <?php if(! $model->isNewRecord): ?>
                                <?= $form->field($model, 'status')->dropDownList(
                                    ['active' => 'Active', 'In-active' => 'In-active'], 
                                    ['prompt' => '']) 
                                ?>
                            <?php endif ?>
                        </div>
                    </div>

                    
                    <?php if(! $model->isNewRecord): ?>
                        <div class="row">
                            <div class="col-md-4">
                                <?= $form->field($model, 'image')->fileInput(['class' => 'image-input']) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <img width="125" height="125" id="image-preview" class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/' . $model->photo ?>" alt="Photo">
                            </div>
                        </div>
                        <hr>
                    <?php endif; ?>
                    

                   

                </div>
            </div>
            <div id="occupants" class="tab-pane fade">
                <a href="#!" class="btn btn-info btn-sm btn-add-occupant">Add Occupants</a>
                <br><br>

                <table class="table">
                   <!--  <thead>
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td>Middle Name</td>
                        <td>Relationship</td>
                        <td>Birth Date</td>
                        <td>Civil Status</td>
                        <td>Occupation</td>
                        <td>Remove</td>
                    </thead> -->
                    <tbody class="tbody-occupant">
                        
                        
                    </tbody>
                </table>

                    <?php if(! $model->isNewRecord && (($occupants = $model->occupants) != NULL)): ?>
                <table class="table table-bordered">
                        <thead>
                            <th>FUllname</th>
                            <th>Relation</th>
                            <th>Birth date</th>
                            <th>Civil status</th>
                            <th>Occupation</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            
                            <?php foreach ($occupants as $occupant) : ?>
                                <tr>
        
                                    <td> 
                                        <?= Yii::$app->access->anchor([
                                            'title' => $occupant->occupantPeople->fullname,
                                            'url' => ['people/view', 'id' => $occupant->occupant_id],
                                            'options' => ['target' => '_blank']
                                        ]) ?>
                                    </td>
                                    <td> <?= $occupant->type ?></td>
                               
                                    
                                    <td> <?= $occupant->occupantPeople->date_of_birth ?></td>
                                    <td> <?= $occupant->occupantPeople->civil_status ?></td>
                                    <td> <?= $occupant->occupantPeople->occupation ?></td>

                                    <td>

                                        <?= Yii::$app->access->tableButton($occupant, [
                                            'template' => ['update', 'delete'],
                                            'controller' => 'occupant'
                                        ]) ?>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                        </tbody>
                </table>
                        <?php endif ?>
                <hr>
             </div>
            <div id="employment-record" class="tab-pane fade">
                    <a href="#!" class="btn btn-info btn-sm btn-add-employment">Add Employment Record</a>
                     <hr>

                    <div class="employment-record filter-box">
                        <?php if(! $model->isNewRecord && (($employments = $model->employments) != NULL)): ?>
                            <?php foreach ($employments as $employment) : ?>
                                <?= $this->render('/employment/_additional-form', [
                                    'key' => Yii::$app->security->generateRandomString(10),
                                    'model' => $employment,
                                    'form' => $form
                                ]) ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
            </div>
            <div id="address" class="tab-pane fade">
                <div class="address">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'blk_id')
                                ->dropDownList(
                                    Block::dropDown(),  
                                    ['prompt' => '']
                                );
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'lot_id')
                                ->dropDownList(
                                    ($model->isNewRecord) ? []: Lot::dropDown(),  
                                    ['prompt' => '']
                                );
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'street_id')
                                ->dropDownList(
                                    ($model->isNewRecord) ? []: Street::dropDown(),  
                                    ['prompt' => '']
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contact-details" class="tab-pane fade">
                <div class="contact-details">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>
                           
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'tel_no')->textInput(['maxlength' => true]) ?>
                            
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>
                           
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'relationship')->dropDownList(
                                Yii::$app->params['relationships'],
                                ['prompt' => 'Select Relationship']
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="other-details" class="tab-pane fade">
                <div class="other-details">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'civil_status')->dropDownList(
                                Yii::$app->params['civil_status'], 
                                ['prompt' => 'Select Civil Status']
                            ) ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'sss')->textInput() ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'tin')->textInput() ?>
                        </div> 
                        <!-- <div class="col-md-12 spouse-list filter-box">
                            <p class="lead">Select Spouse</p>
                            <table class="table table-bordered data">
                                <thead>
                                    <th>Fullname</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                        
                                    <?php if($peoples): ?>
                                        <?php foreach ($peoples as $people) : ?>
                                            <tr>
                                                <td><?= $people->fullname ?></td>
                                                <td><?= $people->address ?></td>
                                                <td width="50" class="text-center">
                                                    <?php if($model->isNewRecord): ?>
                                                        <input type="radio" name="People[spouse_id]" value="<?= $people->id ?>">
                                                    <?php else: ?>
                                                        <input type="radio" name="People[spouse_id]" value="<?= $people->id ?>" <?= ($model->spouse_id == $people->id) ? 'checked': '' ?>>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>

                                </tbody>
                            </table>
                        </div> -->
                    </div> 
                </div>
            </div>
        </div>

         
        

        


        <div class="row"> <br><br>
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
