<?php

namespace app\controllers;

use Yii;
use app\models\Blotter;
use app\models\BlotterSearch;
use app\models\Complainant;
use app\models\Respondent;
use app\models\BlotterForm;
use app\models\People;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlotterController implements the CRUD actions for Blotter model.
 */
class BlotterController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    /**
     * Lists all Blotter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlotterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blotter model.
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
     * Creates a new Blotter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blotter();
        $complainant = new Complainant();
        $blotter = new BlotterForm();
        $respondent = new Respondent();

        $complainants = Complainant::findAll(['blotter_id' => 0]);
        $respondents = Respondent::findAll(['blotter_id' => 0]);

        $model->in_charge = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->case_no = $this->createCaseNo();
            $model->save();

            Complainant::updateAll(
                ['blotter_id' => $model->id], 
                ['blotter_id' => 0]

            );
            Respondent::updateAll(
                ['blotter_id' => $model->id], 
                ['blotter_id' => 0]
            );

            Yii::$app->session->setFlash('success', 'Successfully Save');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'blotter' => $blotter,
            'model' => $model,
            'complainant' => $complainant,
            'complainants' => $complainants,
            'respondent' => $respondent,
            'respondents' => $respondents,
        ]);
    }

    /**
     * Updates an existing Blotter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $blotter = new BlotterForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Successfully Updated');
            return $this->redirect(['view', 'id' => $model->id]);
        }


        $complainant = new Complainant();
        $respondent = new Respondent();

        $complainants = Complainant::findAll(['blotter_id' => $model->id]);
        $respondents = Respondent::findAll(['blotter_id' => $model->id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'blotter' => $blotter,
            'model' => $model,
            'complainant' => $complainant,
            'complainants' => $complainants,
            'respondent' => $respondent,
            'respondents' => $respondents,
        ]);
    }

    /**
     * Deletes an existing Blotter model.
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
     * Finds the Blotter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blotter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blotter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function createCaseNo()
    {
        $total = count(Blotter::findAll(['status' => 0]));
        $res = [
            'C01',
            str_pad($total + 1, 3, '0', STR_PAD_LEFT),
            substr(date('Y'), 2)
        ];

        return implode("-", $res);
    }

    


    public function actionSummary()
    {
       $searchModel = new BlotterSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       return $this->render('summary', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionForm()
    {
        $model = new BlotterForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $people = new People();
            $people->fname = $model->name;
            $people->mobile_no = $model->contact_no;
            $people->status = $model->type;
            $people->is_resident = 0;
            $people->save(false);


            if ($model->type == 'complainant') {
                $complainant = new Complainant();
                $complainant->user_id = $people->id;
                $complainant->address = $model->address;
                $complainant->save();
                Yii::$app->session->setFlash('success', 'Complainant Added.');
            }
            else if($model->type == 'respondent') {
                $respondent = new Respondent();
                $respondent->user_id = $people->id;
                $respondent->address = $model->address;
                $respondent->save();
                Yii::$app->session->setFlash('success', 'Respondent Added.');
            }

        }

        return $this->redirect(['create']);
    }
}
