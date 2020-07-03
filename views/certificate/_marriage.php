
<div class="certificate-preview-form  font-larger">
	<?= $this->render('_header', ['title' => 'CERTIFICATION']) ?>
	
	<div class="row">

		<div class="col-md-8 col-md-offset-2 justify">
		<p> To whom it may concern: </p> <br>
			<p class="ti-50">

				This is to certify that 
				<b class="underline">
					<?= $model->people->fullname ?>
				</b>,

				<b class="underline">
					<?= $model->people->age ?>
				</b>
				
				<b>years of age</b>

				and 

				<b class="underline">
					<?= $model->partner->fullname ?>
				</b>,

				<b class="underline">
					<?= $model->people->age ?>
				</b>

				<b>years</b>

				of age are both residing at 
				
				<b class="underline">
					<?= Yii::$app->template->address($model->people) ?>
				</b>, 

				<b>Brgy. Maderan G.M.A, Cavite.</b>

			</p>

			<br>

			<p class="ti-50">
				This certifies further that the above name couple has been known to me living together for 

				<b class="underline">
					<?= $model->living_together ?>
				</b>

				as common law husband and wife and have a child name: 

				<br> <br>

				<?= $this->render('/people/_siblings', [
					'model' => $model->people
				]) ?>
			</p>

			<br>

			<p class="ti-50">
				Issued upon the request of the above name for marriage under Article 34 of Executive order no 29 of the family code of the Philippines.
			</p>

			<br>

			<p class="ti-50">
				Issued this 
				<b class="underline"> 
					<?= date('d') ?>
				</b> 

				<?php if(date('d') == '01'): ?>
					<sup>st</sup>
				<?php elseif(date('d') == '02'): ?>
					<sup>nd</sup>
				<?php elseif(date('d') == '03'): ?>
					<sup>rd</sup>
				<?php else : ?>
					<sup>th</sup>
				<?php endif; ?>

				day of 

				<b class="underline"><?= date('F Y') ?> </b>.
			</p>

		</div>
	</div>

	<?= $this->render('_footer') ?>
	
</div>
