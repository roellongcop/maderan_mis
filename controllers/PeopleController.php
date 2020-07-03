<?php

namespace app\controllers;

use Yii;

use app\models\PeopleParent;
use app\models\Employment;
use app\models\People;
use app\models\PeopleSearch;
use app\models\Reservation;
use app\models\Occupant;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PeopleController implements the CRUD actions for People model.
 */
class PeopleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    /**
     * Lists all People models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeopleSearch();
        $searchModel->is_resident = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPrintResident()
    {
        $searchModel = new PeopleSearch();
        $searchModel->is_resident = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->layout = 'login';
        return $this->render('print', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionPrintNotResident()
    {
        $searchModel = new PeopleSearch();
        $searchModel->is_resident = 0;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $this->layout = 'login';
        return $this->render('print', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all People models.
     * @return mixed
     */
    public function actionNotResident()
    {
        $searchModel = new PeopleSearch();
        $searchModel->is_resident = 0;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->get('print') !== NULL) {
            $this->layout = 'login';
            return $this->render('print', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single People model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'equipments' => Reservation::getByResident($id),
            'places' => Reservation::getByResident($id, 'place'),
        ]);
    }

    /**
     * Creates a new People model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($is_resident = 1)
    {
        $model = new People();
        $employment = new Employment();
        $model->status = 'active';
        $model->is_resident = $is_resident;
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();


            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();

            $people = People::findOne([
                'fname' => $model->fname,
                'mname' => $model->mname,
                'lname' => $model->lname,
                'sex' => $model->sex,
                'email' => $model->email,
                'sss' => $model->sss,
                'tin' => $model->tin,
            ]);

            

            if (! $people) {
                if($model->save()) {
                    if (isset($post['Employment'])) {
                        if (($employments = $post['Employment']) != NULL) {
                            foreach ($employments as $employment) {
                                $e = new Employment();
                                $e->people_id = $model->id;
                                $e->company_name = $employment['company_name'];
                                $e->address = $employment['address'];
                                $e->duration_from = $employment['duration_from'];
                                $e->duration_to = $employment['duration_to'];
                                $e->save();
                            }
                        }
                    }

                    if (isset($post['People']['occupant'])) {
                        if (($occupants = $post['People']['occupant']) != NULL) {
                            foreach ($occupants as $occupant) {
                                $_people = new People();
                                $_people->lname           = $occupant['lname'];
                                $_people->fname           = $occupant['fname'];
                                $_people->mname           = $occupant['mname'];
                                $_people->family_position = $occupant['family_position'];
                                $_people->date_of_birth   = $occupant['date_of_birth'];
                                $_people->civil_status    = $occupant['civil_status'];
                                $_people->occupation      = $occupant['occupation'];
                                $_people->status          = 'active';
                                $_people->is_resident     = 1;

                                
                                $_people->save(false);

                                $_occupant = new Occupant();
                                $_occupant->user_id = $model->id;
                                $_occupant->occupant_id = $_people->id;
                                $_occupant->type = $occupant['family_position'];
                                $_occupant->save();


                                $related_type = '';

                                if (in_array($occupant['family_position'], ['spouse', 'neighbor', 'friend'])) {
                                    $related_type = $occupant['family_position'];
                                }
                                
                                elseif (in_array($occupant['family_position'], ['mother', 'father'])) {
                                    if ($model->sex == 'male') {
                                        $related_type = 'son';
                                    }
                                    else {
                                        $related_type = 'daughter';
                                    }
                                }
                                elseif (in_array($occupant['family_position'], ['brother', 'sister'])) {
                                    if ($model->sex == 'male') {
                                        $related_type = 'brother';
                                    }
                                    else {
                                        $related_type = 'sister';
                                    }
                                }

                                $_occupant = new Occupant();
                                $_occupant->user_id = $_people->id;
                                $_occupant->occupant_id = $model->id;
                                $_occupant->type = $related_type;
                                $_occupant->save();
                            }
                        }
                    }


                    Yii::$app->session->setFlash('success', 'Successfully Save');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            else {
                Yii::$app->session->setFlash('danger', 'Not Saved. record already exist');
            }
        }

        return $this->render('create', [
            'peoples' => People::findAll(['status' => 'active', 'is_resident' => 1]),
            'model' => $model,
            'employment' => $employment,
        ]);
    }

    /**
     * Updates an existing People model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();


            if($model->save()) {
                 if (isset($post['Employment'])) {
                    if (($employments = Yii::$app->request->post('Employment')) != NULL) {
                        Employment::deleteAll(['people_id' => $model->id]);
                        foreach ($employments as $employment) {
                            $e = new Employment();
                            $e->people_id = $model->id;
                            $e->company_name = $employment['company_name'];
                            $e->address = $employment['address'];
                            $e->duration_from = $employment['duration_from'];
                            $e->duration_to = $employment['duration_to'];
                            $e->save();
                        }
                    }
                }

                 if (isset($post['People']['occupant'])) {
                    if (($occupants = $post['People']['occupant']) != NULL) {
                        foreach ($occupants as $occupant) {
                            $_people = new People();
                            $_people->lname           = $occupant['lname'];
                            $_people->fname           = $occupant['fname'];
                            $_people->mname           = $occupant['mname'];
                            $_people->family_position = $occupant['family_position'];
                            $_people->date_of_birth   = $occupant['date_of_birth'];
                            $_people->civil_status    = $occupant['civil_status'];
                            $_people->occupation      = $occupant['occupation'];
                            $_people->status      = 'active';
                            $_people->is_resident     = 1;
                            $_people->save(false);

                            $_occupant = new Occupant();
                            $_occupant->user_id = $model->id;
                            $_occupant->occupant_id = $_people->id;
                            $_occupant->type = $occupant['family_position'];
                            $_occupant->save();


                            $related_type = '';

                            if (in_array($occupant['family_position'], ['spouse', 'neighbor', 'friend'])) {
                                $related_type = $occupant['family_position'];
                            }
                            
                            elseif (in_array($occupant['family_position'], ['mother', 'father'])) {
                                if ($model->sex == 'male') {
                                    $related_type = 'son';
                                }
                                else {
                                    $related_type = 'daughter';
                                }
                            }
                            elseif (in_array($occupant['family_position'], ['brother', 'sister'])) {
                                if ($model->sex == 'male') {
                                    $related_type = 'brother';
                                }
                                else {
                                    $related_type = 'sister';
                                }
                            }
                          

                            $_occupant = new Occupant();
                            $_occupant->user_id = $_people->id;
                            $_occupant->occupant_id = $model->id;
                            $_occupant->type = $related_type;
                            $_occupant->save();
                        }
                    }
                }
 
                Yii::$app->session->setFlash('success', 'Successfully Updated');
            
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'peoples' => People::find()
                ->where(['status' => 'active', 'is_resident' => 1])
                ->andWhere(['<>', 'id', $id])
                ->all(),
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing People model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 'deleted';
        if($model->save()) {
            return $this->redirect(['index']);
        }

        var_dump($model->errors);

    }

    /**
     * Finds the People model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return People the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = People::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLoad($id)
    {
       return $this->renderAjax('_people', [
            'model' => $this->findModel($id),
            'detailsOnly' => true
       ]);
    }


    /**
     * Lists all People models.
     * @return mixed
     */
    public function actionCard()
    {
        $searchModel = new PeopleSearch();
        $searchModel->is_resident = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('card', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGetSiblings($id)
    {
        return $this->renderPartial('_siblings', [
            'model' => $this->findModel($id)
        ]);
    }

    public function actionPrintId($id='')
    {
        $searchModel = new PeopleSearch();
        $searchModel->is_resident = 1;
        $searchModel->id = $id;

        $query = isset(Yii::$app->request->queryParams['query']) ? Yii::$app->request->queryParams['query']: '';
        $dataProvider = $searchModel->search(json_decode($query, true));

        foreach ($dataProvider->models as $model) {
            $model->date_id_issued = date('Y-m-d');
            $model->save();
        }

        $this->layout = 'login';
        return $this->render('card-print', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionForm()
    {
       return $this->renderAjax('_additional_form', [
            'key' => Yii::$app->security->generateRandomString(10),
            'form' => \yii\widgets\ActiveForm::begin(),
            'model' => new People()
        ]);
    }

    public function actionIdSummary()
    {
        $searchModel = new PeopleSearch();
        $searchModel->no_print = true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->layout = 'login';
        return $this->render('id_summary', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
