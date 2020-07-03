<?php

namespace app\controllers;

use Yii;
use app\models\Reservation;
use app\models\ReservationSearch;
use app\models\People;
use app\models\Place;
use app\models\Equipment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ReservationController implements the CRUD actions for Reservation model.
 */
class ReservationController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    /**
     * Lists all Reservation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReservationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservation model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reservation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reservation();

        if ($model->load(Yii::$app->request->post())) {

            $people = People::find()
                ->where(['control_no' => $model->people_id])
                // ->where(['CONCAT(fname, " ", mname, " ", lname)' => $model->people_id])
                ->one();

            if ($people) {
                $model->people_id = $people->id;
                $post = Yii::$app->request->post();
                $post['Reservation']['people_id'] = $people->id;
                $reservations = $this->formatReservation($post);
                foreach ($reservations as $reservation) {

                    $res = new Reservation();
                    $res->quantity = isset($reservation['rented_quantity']) ? $reservation['rented_quantity']: '';
                    $res->people_id = $reservation['people_id'];
                    $res->date_from = $reservation['date_from'];
                    $res->date_to = $reservation['date_to'];
                    $res->type = $reservation['type'];
                    $res->reference_id = $reservation['reference_id'];
                    $res->status = $reservation['status'];
                    $res->save();

                    
                    $this->updateEntity($res, 'reserved');
                }


                Yii::$app->session->setFlash('success', 'Successfully Save');
                return $this->redirect(['index']);
            }
            else {
                Yii::$app->session->setFlash('danger', 'No Resident Found.');
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function updateEntity($reservation, $status)
    {
        if ($reservation->type == 'equipment') {

           $entity = Equipment::findOne($reservation->reference_id);
           if ($entity) {
               $entity->quantity = $entity->quantity - $reservation->quantity;
               $entity->save();
           }
        } else {

           $entity = Place::findOne($reservation->reference_id);
           if ($entity) {
               $entity->status = $status;

               $entity->save();
            }
        }
    }


    public function actionReturn($id)
    {
        $model = $this->findModel($id);

        if ($model->type == 'equipment') {
            $entity = Equipment::findOne($model->reference_id);
            if ($entity) {
               $entity->quantity = $entity->quantity + $model->quantity;
               $entity->save();
            }
        }
        else {
            $this->updateEntity($model, 'active');
        }


        $model->status = 'returned';
        $model->save();
        
        return $this->redirect(['index']);
    }

    protected function formatReservation($post)
    {
        $data = [];

        $reservations = $post['Reservation']; 

        $people_id = $reservations['people_id'];
        unset($reservations['people_id']);


        if (!empty($reservations['equipment'])) {
            foreach ($reservations['equipment'] as &$reservation) {

                $from = $reservation['date_from'] . ' ' . $reservation['time_from'];
                $to = $reservation['date_to'] . ' ' . $reservation['time_to'];
     
                $data['people_id'][] = $people_id;
                $data['date_from'][] = date_format(date_create($from), 'Y-m-d h:i:s A');
                $data['date_to'][] = date_format(date_create($to), 'Y-m-d h:i:s A');
                $data['type'][] = $reservation['type'];
                $data['reference_id'][] = $reservation['reference_id'];
                $data['rented_quantity'][] = $reservation['rented_quantity'];
                $data['status'][] = 'reserved';

            }
        }

        if (!empty($reservations['place'])) {
            foreach ($reservations['place'] as &$reservation) {

                $from = $reservation['date_from'] . ' ' . $reservation['time_from'];
                $to = $reservation['date_to'] . ' ' . $reservation['time_to'];

                $data['people_id'][] = $people_id;
                $data['date_from'][] = date_format(date_create($from), 'Y-m-d h:i:s A');
                $data['date_to'][] = date_format(date_create($to), 'Y-m-d h:i:s A');
                $data['type'][] = $reservation['type'];
                $data['reference_id'][] = $reservation['reference_id'];
                $data['status'][] = 'reserved';

            }
        }

        $records = [];
        if (isset($data['people_id'])) {
            foreach ($data['people_id'] as $key => $reservation) {

                $records[$key]['people_id'] = $data['people_id'][$key];
                $records[$key]['date_from'] = $data['date_from'][$key];
                $records[$key]['date_to'] = $data['date_to'][$key];
                $records[$key]['type'] = $data['type'][$key];
                $records[$key]['reference_id'] = $data['reference_id'][$key];
                $records[$key]['rented_quantity'] = isset($data['rented_quantity'][$key]) ? $data['rented_quantity'][$key]: '';
                $records[$key]['status'] = $data['status'][$key];
            }
        }

        return $records;
    }


    /**
     * Updates an existing Reservation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Successfully Updated');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reservation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reservation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reservation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reservation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDetail($id)
    {
        return $this->renderAjax('_detail', [
            'model' => $this->findModel($id)
        ]);
    }
}
