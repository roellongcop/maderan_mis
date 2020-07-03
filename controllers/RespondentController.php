<?php

namespace app\controllers;

use Yii;
use app\models\Respondent;
use app\models\RespondentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RespondentController implements the CRUD actions for Respondent model.
 */
class RespondentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    /**
     * Lists all Respondent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RespondentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Respondent model.
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


    public function findResident($user_id, $blotter_id)
    {
        $record = \app\models\People::find()
            ->alias('p')
            ->where(['control_no' =>  $user_id])
            ->andWhere("p.id NOT IN (SELECT user_id FROM {{%complainant}} WHERE blotter_id = $blotter_id)")
            ->andWhere("p.id NOT IN (SELECT user_id FROM {{%respondent}} WHERE blotter_id = $blotter_id)")
            ->andWhere("p.status != 'deleted'")
            ->one();

            return $record;
    }

    /**
     * Creates a new Respondent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($blotter_id="")
    {
        $model = new Respondent();
        $model->blotter_id = $blotter_id === ""? 0: $blotter_id;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $people = $this->findResident($model->user_id, $model->blotter_id);
            if ($people) {
                $model->user_id = $people->id;
                $model->save();
                if ($blotter_id === "") {
                    Yii::$app->session->setFlash('success', $people->fullname . ' was Added');
                    return $this->redirect(['blotter/create']); 
                }

                return $this->redirect(['blotter/update', 'id' => $blotter_id]); 
            }
            else {
                Yii::$app->session->setFlash('danger', 'No Data Found or Data already Added');
            }
        }   

        if ($blotter_id === "") {
            return $this->redirect(['blotter/create']); 
        }
 
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Respondent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Respondent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    

    public function actionDelete($id, $blotter_id="")
    {
        $this->findModel($id)->delete();

        
        if ($blotter_id === "") {
            Yii::$app->session->setFlash('success', 'Complainant Deleted');
            return $this->redirect(['blotter/create']);
        }

        return $this->redirect(['blotter/update', 'id' => $blotter_id]);
        // return $this->redirect(['index']);
    }

    /**
     * Finds the Respondent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Respondent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Respondent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
