
<div class="certificate-preview-form  font-larger">
	
	<?= $this->render('_header', ['title' => 'CERTIFICATION']) ?>


	<div class="row">
 
		<div class="col-md-8 col-md-offset-2 justify">
			<p> To whom it may concern: </p> <br>
			<p class="ti-50">

				This is to certify 
				<b class="underline"><?= $model->people->fullname ?></b> 
				is a resident of a parcel of land located at  

				<b class="underline">
					<?= Yii::$app->template->address($model->people) ?>
				</b>, 

				<b>Brgy. Maderan G.M.A, Cavite.</b> 

			</p>

			<br>

			<p class="ti-50">
				This is to further certifying that the above name is living in the said address since 

				<b class="underline"> <?= $model->resident_since ?> </b>

				up to the present.
			</p>

			<br>

			<p class="ti-50">
				That he/she have never been issued a certification before.
			</p>

			<br>

			<p class="ti-50">
				This certification is being issued upon the request of the bearer  
				<?php if($model->others): ?>
					for <b class="underline"> <?= $model->others ?></b>  and
					<?php else : ?>
					for <b class="underline"> <?= $model->_purpose ?></b>  and
				<?php endif ?> 
				
				for whatever legal purposes this may serve.
			</p>

			<br>


			<p class="ti-50">
				I hereby certify that the above staement are true and correct to the best of my knowledge and belief.
			</p>

			<br>

			<p class="ti-50">
				Given this <b class="underline"> <?= date('d') ?></b> 
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


	<?= $this->render('_footer', ['with_noted' => true]) ?>
	
</div>
