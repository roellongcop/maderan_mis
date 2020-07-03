
<div class="certificate-preview-form  font-larger">
	<?= $this->render('_header', ['title' => 'BUSINESS CLOSURE']) ?>
	
	<div class="row">
 

		<div class="col-md-8 col-md-offset-2 justify">
		<p> To whom it may concern: </p> <br>
			<p class="ti-50">

				This is to certify that <b class="underline"><?= ucwords($model->business_name) ?></b>, is a former business establishment registered at this barangay with business address at 
				<b class="underline"><?= ucwords($model->business_address) ?> Brgy. Maderan General Mariano Alvarez, Cavite</b>, owned by 

				<b class="underline"><?= $model->people->fullname ?></b>

				and that said business has been foreclose and no longer operating since <b class="underline"><?= $model->business_foreclosed ?></b>
			</p>

			<br>

			<p class="ti-50">
				This certification is being issued upon th request of the bearer for whatever legal purposes this may serve.
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
				 day of <b class="underline"><?= date('F Y') ?></b>.
			</p>

		</div>
	</div>

	<?= $this->render('_footer') ?>
	
</div>
