
<div class="certificate-preview-form  font-larger">
	<?= $this->render('_header', ['title' => 'CERTIFICATION FOR DELAYED REGISTRATION OF LIVE BIRTH']) ?>
	
	<div class="row">

		<div class="col-md-8 col-md-offset-2 justify">
		<p class="upper"> To whom it may concern: </p> <br>
			<p class="ti-50">


				This is to certify that 

				<b class="underline"> <?= ucwords($model->child_name) ?>, </b>
				was born on 

				<b class="underline"> <?= $model->child_born ?> </b>
				, residing at 


				<b class="underline">
					<?= Yii::$app->template->address($model->people) ?>
				</b>,
				<b>Brgy. Maderan G.M.A, Cavite, </b>

				<b class="underline">
					<?= ucwords($model->child_relationship) ?>
				</b>

				of

				<b class="underline">
					<?= $model->people->fullname ?>
				</b>

				<b>and</b>

				<b class="underline">
					<?= ($model->partner) ? $model->partner->fullname: '' ?>.
				</b>


			</p>

			<br>

			<p class="ti-50">
				Further, the birth of the said child was not registered with the Office of the Civil Registrar of General Mariano Alvarez, as such this certification is being issued for the purpose of late registration of love birth.
			</p>

			<br>

			<p class="ti-50">
				I hereby certify that the above statement are true and correct to the best of my knowledge.
			</p>

			<br>

			<p class="ti-50">
				Issued this <b class="underline"> <?= date('d') ?></b> 
				<?php if(date('d') == '01'): ?>
					<sup>st</sup>
				<?php elseif(date('d') == '02'): ?>
					<sup>nd</sup>
				<?php elseif(date('d') == '03'): ?>
					<sup>rd</sup>
				<?php else : ?>
					<sup>th</sup>
				<?php endif; ?>
				day of <b class="underline"><?= date('F Y') ?> </b>.
			</p>

		</div>
	</div>

	
	<?= $this->render('_footer') ?>
	
</div>
