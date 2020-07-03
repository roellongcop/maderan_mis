<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\NatureOfCasesSearch;
$params = Yii::$app->params;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlotterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Summary Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blotter-index">

	<p>
		<?= Html::button('Print Report',[
			'class' => 'btn btn-success btn-print'
		]) ?>

	</p><br>



	<div class="print">
		<div class="row text-center">

			<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-2">
				<div style="display: flex;">
					<img src="/mis/img/maderanlogo.jpg" width="100" style="height: 73px; margin-right: 17px;">
					<h4>
						LUPON TAGAPAMAYAPA REPORT: CASES FILED ACTION TAKEN 
						<br> AND PROBLMES ENCOUNTERED ON KP IMPLEMENTATION
					</h4>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 col-xs-4">
				Province: Cavite <br>
				City/Municipality: General Mariano Alvarez <br>
				Barangay Gavino Maderan
			</div>
			<div class="col-md-2 col-xs-3 col-md-offset-6 col-xs-offset-5">
				Month: <?= strtoupper(date('F Y')) ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<table class="table table-bordered summary-table">
					<thead>
						<tr>
							<th rowspan="2">Case No.</th>
							<th rowspan="2">Date Filed</th>
							<th rowspan="2">COMPLAINANT ET AL</th>
							<th rowspan="2">RESPONDENT ET AL</th>

							<th colspan="3">NATURE OF CASE</th>
							<th colspan="5">Action Taken</th>

							<th rowspan="2">Remarks</th>
						</tr>
						<tr>
							<?php foreach (NatureOfCasesSearch::dropdown() as $val): ?>
								<th><?= $val ?></th>
							<?php endforeach; ?>


							<?php foreach ($params['action_taken'] as $val): ?>
								<th><?= $val ?></th>
							<?php endforeach; ?>


						</tr>
					</thead>
					<tbody>
						<?= ListView::widget([
			                'dataProvider' => $dataProvider,
			                'itemView' => '_summary',
			                'viewParams' => ['params' => $params]
			            ]) ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
