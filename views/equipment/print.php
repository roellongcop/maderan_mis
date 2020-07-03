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
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>CATEGORY</th>
                <th>QUANTITY</th>
                <th>UNIT</th>
                <th>RENTABLE</th>
                <th>RENT FEE (₱)</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
        	<?php if($models): ?>
	        	<?php foreach ($models as $model) : ?>
	        		<?= $this->render('_print', ['model' => $model]) ?>
	        	<?php endforeach ?>
        	<?php endif ?>
            
        </tbody>
    </table>
	</div>
</div>
