
<div class="certificate-preview-form  font-larger">
	<?= $this->render('_header', ['title' => 'CERTIFICATION']) ?>
	
	<div class="row">

		<div class="col-md-8 col-md-offset-2 justify">
		<p> To whom it may concern: </p> <br>
			<p class="ti-50">

				This is to certify that 

				<b class="underline"><?= $model->people->fullname ?>  </b> 

				<b>AND </b>

				<b class="underline"><?= $model->partner->fullname ?></b>.

				Both legal age, residents of 

				<b class="underline">
					<?= Yii::$app->template->address($model->people) ?>
				</b>
				
				<b>Brgy. Maderan General Mariano Alvarez, Province of Cavite.</b>



			</p>

			<br>

			<p class="ti-50">
				This is to further certify that the aforementioned names have been living together since 
				<b class="underline"><?= $model->partner_since ?></b>
				as live-in partners.
			</p>


			<br>

			<p class="ti-50">
				This certification is being given upon the request of both parties for 
				<?php if($model->others): ?>
					for <b class="underline"> <?= $model->others ?></b> 
					<?php else : ?>
					for <b class="underline"> <?= $model->_purpose ?></b> 
				<?php endif ?> 
				and for whatever legal purposes this may serve.
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
