<?php

namespace app\controllers;

use Yii;

use app\models\Medicine;
use app\models\People;
use app\models\Distribution;
use app\models\DistributionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DistributionController implements the CRUD actions for Distribution model.
 */
class DistributionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    /**
     * Lists all Distribution models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DistributionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Distribution model.
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
     * Creates a new Distribution model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($search='')
    {
        $peoples = [];
        $model = new Distribution();
        if (($post = Yii::$app->request->post()) != NULL) {
            $insert = false;
            if (isset($post['people'])) {
                foreach ($post['people'] as $people) {
                    if (isset($post['quantity'])) {
                        foreach ($post['quantity'] as $medicine_id => $quantity) {
                            if($quantity) {
                                $medicine = Medicine::findOne($medicine_id);

                                $model = new Distribution();
                                $model->people_id = $people;
                                $model->medicine_id = $medicine_id;
                                $model->quantity = $quantity;
                                $model->date = date('Y-m-d');
                                $model->save(false);

                                $$quantity = ($quantity) ? $quantity: 0;
                                $medicine->quantity = ($medicine->quantity) ? $medicine->quantity: 0;
                                $medicine->quantity = (int)$medicine->quantity - (int)$quantity;
                                $medicine->save();
                                $insert = true;
                            }
                        }
                    }
                }
            }

            if ($insert) {
                Yii::$app->session->setFlash('success', 'Distribution saved');
            }
                return $this->redirect(['index']);
        }

        if ($model->load(Yii::$app->request->get())) {
            if ($model->search) {
                $peoples = People::find()
                    ->where(['control_no' => $model->search])
                    ->andFilterWhere(['status' => 'active'])
                    ->all();
            }
        }

        return $this->render('create', [
            'peoples' => $peoples,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Distribution model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $medicine = Medicine::findOne($model->medicine_id);

            if ($medicine) {
                $medicine->quantity = ($medicine->quantity) ? $medicine->quantity: 0;

                $medicine->quantity = (int)$medicine->quantity - (int)$model->quantity;

                if ($medicine->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            else {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        else {
            $medicine = $model->medicine;
            // if ($medicine) {
            //     $medicine->quantity = ($medicine->quantity) ? $medicine->quantity: 0;

            //     $medicine->quantity = (int)$medicine->quantity + (int)$model->quantity;
            //     $medicine->save();
            // }
        }

        return $this->render('update', [
            'medicine' => $medicine,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Distribution model.
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
     * Finds the Distribution model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Distribution the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Distribution::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionCancel($id)
    {
        // $model = $this->findModel($id);
        // $medicine = $model->medicine;

        // $medicine->quantity = $medicine->quantity - $model->quantity;
        // $medicine->status = 'active';
        // $medicine->archive_reason = '';
        // $medicine->save();

        return $this->redirect(['index']);
    }

   
}
