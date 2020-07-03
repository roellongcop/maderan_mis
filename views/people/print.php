<?php
use yii\widgets\ListView;

$src = <<< JS
	window.print()
JS;

$this->registerJs($src);
?>
<div class="row">
	<div class="col-md-2 col-xs-2">
		<img src="/mis/img/maderanlogo.jpg" width="100">
	</div>
	<div class="col-xs-8 col-md-8 text-center">
		<h4>
			<b>
				REPUBLIC OF THE PHILIPPINES <br>
				PROVINCE OF CAVITE <br>
				MUNICIPALITY OF GEN. MARIANO ALVAREZ <br>
				BARANGAY GAVINO MADERAN
			</b>
		</h4>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered table-striped data">
        <thead>
            <tr>
                <th>control no</th>
                <th>FULLNAME</th>
                <th>ADDRESS</th>
                <th>AGE</th>
                <th>SEX</th>
            </tr>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_people',
                'viewParams' => ['with_action' => FALSE]
            ]) ?>
        </tbody>
    </table>
	</div>
</div>
