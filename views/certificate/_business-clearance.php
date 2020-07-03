<div class="text-center">
			
	<div class="header-clearance">
		<div class="col-xs-2">
			<img src="/mis/img/maderanlogo.jpg" width="100">
		</div>
		<div class="col-xs-8 col-md-8">
			<h4>
				<b>
					REPUBLIC OF THE PHILIPPINES <br>
					PROVINCE OF CAVITE <br>
					MUNICIPALITY OF GEN. MARIANO ALVAREZ <br>
					BARANGAY GAVINO MADERAN
				</b>
			</h4>
			<h2 class="clearance-title">
				<b>BARANGAY BUSINESS CLEARANCE</b>
			</h2>

		

		<br>
		<h3><b>is hereby granted to</b></h3> 

		<br>
		<br>

		<h1 class="underline larger">
			<?= strtoupper($model->business_name) ?>
		</h1>
		<h3><b>BUSINESS NAME</b></h3> 

		<br>
		<br>

		<h3><b>owned by</b></h3> 
		<br>
		<br>

		<h1 class="underline larger">
			<?= strtoupper($model->people->fullname) ?>
		</h1>
		<h3><b>OWNER/PROPRIETOR</b></h3> 

		<br>
		<br>

		<h3><b>with business address at</b></h3> 
		<br>

		<h1 class="underline larger">
			<?= strtoupper(Yii::$app->template->address($model->people)) ?>
		</h1>
		<br>
		<br>

		<h3><b>by</b></h3> 

		<br> <br> <br>  <br> 


		<h3><b>HON. <?= Yii::$app->template->official('captain') ?> <br>
			Punong Barangay
		</b></h3>


		<br> <br> <br> 

		</div>

	</div>

</div>
<div class="row">
	<div class="col-md-6 col-xs-10 col-md-offset-2 col-xs-offset-1">
		
		<h2 class="orange">
			<b>PATULOY  NA NAGKAKAISA</b>
		</h2>

	</div>

	<div class="col-md-6 col-xs-10 col-md-offset-6 col-xs-offset-6">
		
		<h2 class="blue">
			<b>PATULOY NA SUMISIGLA.</b>
		</h2>

	</div>
	<div class="col-md-12 col-xs-12 text-center">
		 <br> 
		<h3>
			PAMAHALAANG BUKAS SA LAHAT NG MAMAMAYAN
		</h3>
	</div>
</div>
<br><br>
