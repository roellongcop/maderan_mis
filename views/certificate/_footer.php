</div>
<div class="row">
	<div class="col-md-3 col-xs-6 col-md-offset-7 col-xs-offset-8">


		<p class="certified-by">Certified by: </p>


		<br> <br>

		<b class="signatory"><?= Yii::$app->template->official('captain') ?></b> <br>
		Barangay Chairman

		<br><br><br><br>
	</div>
</div>

<?php if(isset($with_noted) && $with_noted == true): ?>

	<div class="row">
		<div class="col-md-4 col-xs-6 col-md-offset-2 col-xs-offset-2">

			<p class="noted-by">Noted By; </p>


			<br> <br>

			<b class="signatory">Hon. WALTER D. ECHEVARRIA JR</b> <br>
			Municipal Mayor

			<br><br><br><br>
		</div>
	</div>
<?php endif; ?>