<?php

namespace app\controllers;

use Yii;
use app\models\People;
use app\models\Reservation;
use app\models\Medicine;
use app\models\Equipment;
use app\models\Place;

class DashboardController extends \yii\web\Controller
{
	public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    public function actionIndex()
    {
    	$data['registered'] = People::get();
    	$data['reservation'] = Reservation::get();
    	$data['medicine'] = Medicine::get();
    	$data['equipments'] = Equipment::all();
    	$data['places'] = Place::get('reserved', false);

        return $this->render('index', $data);
    }

}
