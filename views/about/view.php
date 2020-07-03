<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\About */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'About', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'About';
?>
<div class="about-view">
    <?= Yii::$app->access->button('update', ['model' => $model]) ?>
   
    <br> <br>

    

    <div class="row">
    	
    	<div class="col-md-7">
    		<?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		            'name',
		            'description:ntext',
		        ],
		    ]) ?>
    	</div>
    	<div class="col-md-5">
    		<img class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/' . $model->photo ?>">
    	</div>
    </div>

</div>
