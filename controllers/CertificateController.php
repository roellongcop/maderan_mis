<?php

namespace app\controllers;

use Yii;
use app\models\Certificate;
use app\models\CertificateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
/**
 * CertificateController implements the CRUD actions for Certificate model.
 */
class CertificateController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Yii::$app->access->behaviors();
    }

    /**
     * Lists all Certificate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CertificateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Certificate model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $data['model'] = $this->findModel($id);


        switch ($data['model']->name) {
            case 'residency':
                $data['certificate'] = $this->renderPartial('_residency', $data);
                break;

            case 'business_closure':
                $data['certificate'] = $this->renderPartial('_business_closure', $data);
                break;

            case 'live_in_partners':
                $data['certificate'] = $this->renderPartial('_live-in-partner', $data);
                break;

            case 'employment':
                $data['certificate'] = $this->renderPartial('_employment', $data);
                break;

            case 'delayed_registration':
                $data['certificate'] = $this->renderPartial('_delayed-registration', $data);
                break;

            case 'no_business':
                $data['certificate'] = $this->renderPartial('_no-business', $data);
                break;

            case 'parcel_of_land':
                $data['certificate'] = $this->renderPartial('_parcel-of-land', $data);
                break;

            case 'indigency':
                $data['certificate'] = $this->renderPartial('_indigency', $data);
                break;

            case 'marriage':
                $data['certificate'] = $this->renderPartial('_marriage', $data);
                break;

            case 'business_clearance':
                $data['certificate'] = $this->renderPartial('_business-clearance', $data);
                break;

            case 'brgy_clearance':
                $data['certificate'] = $this->renderPartial('_brgy-clearance', $data);
                break;
            default:
                # code...
                break;
        }

        return $this->render('view', $data);
    }

    /**
     * Creates a new Certificate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Certificate();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->business_foreclosed) {
                $model->business_foreclosed = date('Y-m-d', strtotime($model->business_foreclosed));
            }

            if($model->child_born) {
                $model->child_born = date('Y-m-d', strtotime($model->child_born));
            }

            if($model->partner_since) {
                $model->partner_since = date('Y-m-d', strtotime($model->partner_since));
            }

            if($model->resident_since) {
                $model->resident_since = date('Y-m-d', strtotime($model->resident_since));
            }

            

            // print_r(Yii::$app->request->post()); die;
            $model->save();
            Yii::$app->session->setFlash('success', 'Successfully Created');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Certificate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->business_foreclosed) {
                $model->business_foreclosed = date('Y-m-d', strtotime($model->business_foreclosed));
            }

            if($model->child_born) {
                $model->child_born = date('Y-m-d', strtotime($model->child_born));
            }

            if($model->partner_since) {
                $model->partner_since = date('Y-m-d', strtotime($model->partner_since));
            }

            if($model->resident_since) {
                $model->resident_since = date('Y-m-d', strtotime($model->resident_since));
            }

            $model->save();
            Yii::$app->session->setFlash('success', 'Successfully Updated');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Certificate model.
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
     * Finds the Certificate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Certificate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Certificate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionForm($certificate='', $id="")
    {
        $model = $id === "" ? new Certificate(): $this->findModel($id);
        $form = ActiveForm::begin();

        switch ($certificate) {
            case 'residency':
                $view = '_residency-input';
                break;

            case 'business_closure':
                $view = '_business_closure-input';
                break;

            case 'live_in_partners':
                $view = '_live-in-partner-input';
                break;

            case 'employment':
                $view = '_employment-input';
                break;

            case 'delayed_registration':
                $view = '_delayed-registration-input';
                break;

            case 'no_business':
                $view = '_no-business-input';
                break;


            case 'parcel_of_land':
                $view = '_parcel-of-land-input';
                break;

            case 'indigency':
                $view = '_indigency-input';
                break;

            case 'marriage':
                $view = '_marriage-input';
                break;

            case 'business_clearance':
                $view = '_business-clearance-input';
                break;

            case 'brgy_clearance':
                $view = '_brgy-clearance-input';
                break;

            default:
                return '';
                break;
        }


        return $this->renderAjax($view, [
            'form' =>  $form,
            'model' => $model,
        ]);
    }
}
