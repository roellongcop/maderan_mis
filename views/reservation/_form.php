<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\People;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-form" id="reservation-form">
    <?php $form = ActiveForm::begin(); ?> 
        <div class="row">
            <div class="col-md-5">
                <?= $form->field($model, 'people_id')
                    ->textInput()?>
            </div>
        </div>

        
        <div id="people-details"></div>

        <hr>
        <h3>ITEM</h3> <br>
        <a class="btn btn-primary" data-toggle="modal" data-target="#mdl-equipment">
            <i class="fa fa-plus"></i>
            Add Item
        </a> <br> <br>

        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th colspan="2">FROM</th>
                    <th colspan="2">TO</th>
                    <th>REMOVE</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(equipment, index) in rentedEquipment">

                    <td> 
                        <b>{{ equipment.name }}</b> <br>
                        <i>{{ equipment.rented_quantity }} {{ equipment.unit.name }}</i>
                        <input type="hidden"  value="equipment" :name="'Reservation[equipment][' + index + '][type]'">
                        <input type="hidden"  :value="equipment.id" :name="'Reservation[equipment][' + index + '][reference_id]'">
                        <input type="hidden"  :value="equipment.rented_quantity" :name="'Reservation[equipment][' + index + '][rented_quantity]'">
                    </td>
                    <td>
                        <label>DATE</label>
                        <input :name="'Reservation[equipment][' + index + '][date_from]'"  class="form-control dpicker">
                    </td>
                    <td>
                        <label>TIME</label>
                        <input type="time" :name="'Reservation[equipment][' + index + '][time_from]'" class="form-control">
                    </td>
                    <td>
                        <label>DATE</label>
                        <input :name="'Reservation[equipment][' + index + '][date_to]'" class="form-control dpicker">
                    </td>
                    <td>
                        <label>TIME</label>
                        <input type="time" :name="'Reservation[equipment][' + index + '][time_to]'" class="form-control ">
                    </td>
                    <td>
                        <a @click="removeEquipment(index)" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    
                </tr>
            </tbody>
        </table>


        <hr>
        <h3>PLACE</h3> <br>
        <a class="btn btn-primary" data-toggle="modal" data-target="#mdl-place">
            <i class="fa fa-plus"></i>
            Add Place
        </a> <br> <br>

        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th colspan="2">FROM</th>
                    <th colspan="2">TO</th>
                    <th>REMOVE</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(place, index) in rentedPlace">
                    <td> 
                        {{ place.name }} 
                        <input type="hidden" value="place" :name="'Reservation[place][' + index + '][type]'">
                        <input type="hidden"  :value="place.id" :name="'Reservation[place][' + index + '][reference_id]'">
                    </td>
                    <td>
                        <label>DATE</label>
                        <input :name="'Reservation[place][' + index + '][date_from]'"  class="form-control dpicker">
                    </td>
                    <td>
                        <label>TIME</label>
                        <input type="time" :name="'Reservation[place][' + index + '][time_from]'" class="form-control">
                    </td>
                    <td>
                        <label>DATE</label>
                        <input :name="'Reservation[place][' + index + '][date_to]'" class="form-control dpicker">
                    </td>
                    <td>
                        <label>TIME</label>
                        <input type="time" :name="'Reservation[place][' + index + '][time_to]'" class="form-control">
                    </td>
                    <td>
                        <a @click="removePlace(index)" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    

        <div class="form-group">
            <?= Html::a('Cancel', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton(($model->isNewRecord)? 'Ok': 'Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <div id="mdl-equipment" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Available Equipments</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>RENT PRICE</th>
                                <th>QUANTITY</th>
                                <th>CATEGORY</th>
                                <th colspan="2">RENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(equipment, index) in equipments">

                                <td> {{ equipment.name }} </td>
                                <td>₱ {{ equipment.rent_price }} </td>
                                <td>{{ equipment.quantity }} </td>
                                <td> {{ equipment.category.name }} </td>
                                <td width="10%">
                                    <input type="number" v-model="equipment.rented_quantity" class="form-control" :max="equipment.quantity">
                                </td>
                                <td>
                                    <a @click="addEquipment(index)" data-dismiss="modal" class="btn btn-primary btn-rent-equipment">
                                        Rent
                                    </a>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div id="mdl-place" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Available Places</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>ADDRESS</th>
                                <th>RENT PRICE</th>
                                <th>RENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(place, index) in places">
                                <td> {{ place.name }} </td>
                                <td>Blk {{ place.block.blk_no }} Lot {{ place.lot.lot_no }} {{ place.street.name }}</td>
                                <td>₱  {{ place.rent_price }} </td>
                                <td>
                                    <a @click="addPlace(index)" data-dismiss="modal" class="btn btn-primary">
                                        Rent
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>



