<?php

$this->title = 'Dashboard';
$this->params['page'] = 'Dashboard';

?>

<div id="page-dashboard">
	<div class="row">
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-1 hvr-float-shadow">
				<div class="col-md-6 market-update-left">
					<h3><?= count($registered) ?></h3>
					<h4>Residents</h4>
					<!-- <p>Other hand, we denounce</p> -->
				</div>
				<div class="col-md-3 market-update-right">
					<i class="fa fa-file-text-o"> </i>
				</div>
			  <div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-2 hvr-float-shadow">
			 	<div class="col-md-6 market-update-left">
					<h3><?= count($reservation) ?></h3>
					<h4>Reservation</h4>
					<!-- <p>Other hand, we denounce</p> -->
			 	</div>
				<div class="col-md-3 market-update-right">
					<i class="fa fa-calendar"> </i>
				</div>
			  	<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-3 hvr-float-shadow">
				<div class="col-md-6 market-update-left">
					<h3><?= count($medicine) ?></h3>
					<h4>Medicines</h4>
				</div>
				<div class="col-md-3 market-update-right">
					<i class="fa fa-medkit"> </i>
				</div>
			  <div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-4 hvr-float-shadow">
				<div class="col-md-6 market-update-left">
					<h3><?= count($equipments) ?></h3>
					<h4>Equipments</h4>
				</div>
				<div class="col-md-3 market-update-right">
					<i class="fa fa-shopping-cart"> </i>
				</div>
			  <div class="clearfix"> </div>
			</div>
		</div>
	</div>


	<div class="row"> <br> <br>
		<div class="col-md-6"> 
			<div class="portlet panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Reserve Equipments</h3>
				</div> 
				<div class="panel-body">
					<?= $this->render('_reserved_equipment', [
						'equipments' => $equipments,
						'reservation' => $reservation,
					]) ?>
				</div>
			</div>
		</div>
		<div class="col-md-6"> 
			<div class="portlet panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Reserve Places</h3>
				</div> 
				<div class="panel-body">
					<?= $this->render('_reserved_places', [
						'places' => $places,
						'reservation' => $reservation,
					]) ?>
				</div>
			</div>
		</div>
	</div>

</div>

 