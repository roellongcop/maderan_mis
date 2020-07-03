<div class="row">
	<div class="col-md-7 col-xs-7">
		<div class="text-center">
			<div class="col-xs-3">
				<img src="/mis/img/maderanlogo.jpg" width="80">
			</div>
			<div class="col-xs-9 col-md-6">
			<h5>
				Republic of the Philippines <br>
				Province of Cavite <br>
				Municipality of General Mariano Alvarez
			</h5>

			<h5 class="orange">
				<b>BARANGAY GAVINO MADERAN</b>
			</h5>

			<h5 class="blue">Office of the Punong Barangay</h5>

			<h4 class="orange">
				<b>BARANGAY CLEARANCE</b>
			</h4>
			</div>
		</div>

		<br>


		<table class="table">
			<tbody>
				<tr>
					<th>NAME: </th>
					<td colspan="3"><?= $model->people? $model->people->fullname: '' ?></td>
				</tr>

				<tr>
					<th>ADDRESS: </th>
					<td colspan="3"><?= $model->people? Yii::$app->template->address($model->people): '' ?></td>
				</tr>

				<tr>
					<th>DATE OF BIRTH: </th>
					<td><?= $model->people->date_of_birth ?></td>
					<th>PLACE:</th>
					<td><?= ucwords($model->people->place_of_birth) ?></td>
				</tr>

				<tr>
					<th>CIVIL STATUS: </th>
					<td><?= ucwords($model->people->civil_status) ?></td>
					<th>SEX:</th>
					<td><?= ucwords($model->people->sex) ?></td>
				</tr>

				<tr>
					<th>PURPOSE: </th>
					<td colspan="3"><?= ucfirst(($model->others) ? $model->others: $model->_purpose) ?></td>
				</tr>

				<tr>
					<th>FINDINGS: </th>
					<td colspan="3"><?= ucfirst($model->findings) ?></td>
				</tr>

			</tbody>
		</table>



		<h5 class="text-center italic blue">
			Issued this <span class="underline"> <?= date('d') ?></span> 
			<?php if(date('d') == '01'): ?>
				<sup>st</sup>
			<?php elseif(date('d') == '02'): ?>
				<sup>nd</sup>
			<?php elseif(date('d') == '03'): ?>
				<sup>rd</sup>
			<?php else : ?>
				<sup>th</sup>
			<?php endif; ?>
			day of <span class="underline"><?= date('F Y') ?> </span>


			at  <br>

			Barangay Gavino Maderan, General Mariano Alvarez Cavite for <br>


			purpose declared herein Furthermore, validity of this clearance is <br> until 60 days upon the date of issuance and may be void <br> 

			<h4 class="orange text-center italic">
				<b>WITHOUT DRY SEAL</b>
			</h4>
		</h5>

		<div class="col-md-6 col-md-offset-6 col-xs-7 col-xs-offset-5">
			<br> 
			<h5 class="italic blue">
				<?= Yii::$app->template->official('captain') ?> <br>
				Punong barangay
			</h5>

			<br>
			<h5 class="italic">
				Verified by: <?= Yii::$app->template->official('secretary') ?> <br>
				Barangay Secretary
			</h5>
		</div>

	</div>

	<div class="col-md-5 col-xs-5">
		<div class="text-center">
			<h5><?= strtoupper(Yii::$app->template->official('captain')) ?></h5>
			<h5 class="blue">Punong Barangay</h5>
			<br>
			<h5 class="orange italic">Sangguniang Barangay members</h5>
			<br>
			<?php foreach (Yii::$app->template->official('sb_member', 'all') as $sb) : ?>
				<?php if($sb->people): ?>
				<h5>HON. <?= strtoupper($sb->people->fullname) ?></h5>
				<?php endif ?>
			<?php endforeach; ?>

				<br>
				<h5><?= Yii::$app->template->official('secretary') ?></h5>
				<h5 class="blue italic">Barangay Secretary</h5>

				<br>
				<h5> <?= Yii::$app->template->official('treasurer') ?></h5>
				<h5 class="blue italic">Barangay Secretary</h5>
		</div>
	</div>
</div>