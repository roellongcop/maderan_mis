
<div class="certificate-preview-form  font-larger">
	<?= $this->render('_header', ['title' => 'CERTIFICATION OF RESIDENCY']) ?>
	
	<div class="row">

		<div class="col-md-8 col-md-offset-2 justify">
		<p> To whom it may concern: </p> <br>
			<p class="ti-50">

				This is to certify that <b class="underline"><?= $model->people->fullname ?></b>, legal age, residing at 

				<b class="underline">
					<?= Yii::$app->template->address($model->people) ?>
				</b>, 

				<b>Brgy. Maderan G.M.A, Cavite</b> is a resident of this barangay as evident of the above-given address since <?= date('Y', strtotime($model->people->date_of_birth)) ?> 

				<b>up to present</b> and known to me personally with good moral character and has no <b>NO ANY DEROGATORY RECORD</b> filed in this barangay.
			</p>

			<br>

			<p class="ti-50">
				This certification is being issued upon th request of the above name  
				<?php if($model->others): ?>
					for <b class="underline"> <?= $model->others ?></b>  and
					<?php else : ?>
					for <b class="underline"> <?= $model->_purpose ?></b>  and
				<?php endif ?>
				for whatever legal purposes this may serve.
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
