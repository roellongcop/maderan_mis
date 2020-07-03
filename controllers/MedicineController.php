<?php

namespace app\controllers;

use Yii;
use app\models\Medicine;
use app\models\MedicineSearch;

use app\models\ArchiveMedicine;
use app\models\ArchiveMedicineSearch;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MedicineController implements the CRUD actions for Medicine model.
 */
class MedicineController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    /**
     * Lists all Medicine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedicineSearch();
        $searchModel->status = 'active';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $archive_searchModel = new ArchiveMedicineSearch();
        $archive_dataProvider = $archive_searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'archive_searchModel' => $archive_searchModel,
            'archive_dataProvider' => $archive_dataProvider,
        ]);
    }

    /**
     * Displays a single Medicine model.
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
     * Creates a new Medicine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Medicine();
        $model->status = 'active';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Successfully Save');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Medicine model.
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
     * Deletes an existing Medicine model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->canDelete) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Successfully Deleted');
        }
        else {
            Yii::$app->session->setFlash('danger', 'Cannot be deleted because there are '.implode(' or ', $model->relatedModels).' dependent with this');
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the Medicine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Medicine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Medicine::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrint($expired='')
    {
        $models = Medicine::find()
            ->all();
       

        $this->layout = 'login';

        return $this->render('print', [
            'models' => $models,
            'expired' => $expired,
        ]);
    }

    public function actionMoveToArchived($id)
    {
        $model = $this->findModel($id);
        $archived = new ArchiveMedicine();
        $archived->medicine_id = $model->id;


        if ($archived->load(Yii::$app->request->post()) && $archived->save()) {

            $model->quantity = $model->quantity - $archived->quantity;
            $model->save();
            Yii::$app->session->setFlash('success', 'Move to Archived');
            return $this->redirect(['index']);
        }

        return $this->render('move_to_archived', [
            'model' => $model,
            'archived' => $archived,
        ]);
    }

    public function actionRestore($id)
    {
        $model = ArchiveMedicine::findOne($id);
        $medicine = $model->medicine;

        $medicine->quantity = $medicine->quantity + $model->quantity;
        $medicine->save();

        $model->delete();
        Yii::$app->session->setFlash('success', 'Restore');

        return $this->redirect(['index']);

    }
}
