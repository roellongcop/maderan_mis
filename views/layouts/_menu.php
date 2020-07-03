<li class="<?= $page == 'dashboard' ? 'active-page' : '' ?>">
	<?= Html::a('<i class="fa fa-tachometer"></i><span>Dashboard</span>', ['/dashboard']) ?>
</li>


<li class="<?= in_array($page, ['people', 'resident', 'not-resident']) ? 'active-page' : '' ?>">

	<?= Html::a('<i class="fa fa-group"></i><span>Peoples</span>
		<span class="fa fa-angle-right" style="float: right"></span>', '#') ?>
	<ul>
		<li>
        	<?= Html::a('<i class="fa fa-user"></i>Resident', ['people/index']) ?>
        </li>
        <li>
        	<?= Html::a('<i class="fa fa-info-circle"></i>Not Resident', ['people/not-resident']) ?>
        </li>
    </ul>
</li>



<?php if($user->type == 'head'): ?>
    <li class="<?= $page == 'blotter' ? 'active-page' : '' ?>">
    	<?= Html::a('<i class="fa fa-book"></i><span>Blotter</span>', ['/blotter']) ?>
    </li>
<?php endif ?>

<?php if($user->type == 'head' || $user->type == 'staff' || $user->type == 'secretary'): ?>
    <li class="<?= $page == 'certificate' ? 'active-page' : '' ?>">
    	<?= Html::a('<i class="fa fa-certificate"></i><span>Certificates</span>', ['/certificate']) ?>
    </li>
<?php endif ?>

<?php if($user->type == 'staff'): ?>
    <li class="<?= $page == 'reservation' ? 'active-page' : '' ?>">
    	<?= Html::a('<i class="fa fa-calendar"></i><span>Reservation</span>', ['/reservation']) ?>
    </li>
<?php endif ?>


<?php if($user->type == 'secretary'): ?>
   	<li class="<?= in_array($page, ['official', 'history', 'achievement', 'about']) ? 'active-page' : '' ?>">

    	<?= Html::a('<i class="fa fa-gear"></i><span>About Us </span>
    		<span class="fa fa-angle-right" style="float: right"></span>', '#') ?>
    	<ul>
    		<li>
	        	<?= Html::a('<i class="fa fa-globe"></i>General', ['/about']) ?>
	        </li>
	        <li>
	        	<?= Html::a('<i class="fa fa-info-circle"></i>Officials', ['/official']) ?>
	        </li>
	        <li>
	        	<?= Html::a('<i class="fa fa-book"></i>History', ['/history']) ?>
	        </li>
	        <li>
	        	<?= Html::a('<i class="fa fa-trophy"></i>Achievement', ['/achievement']) ?>
	        </li> 
        </ul>
    </li>
<?php endif ?>







<?php if($user->type == 'secretary'): ?>

    <li class="<?= in_array($page, ['place', 'block', 'lot', 'street']) ? 'active-page' : '' ?>">
    	<?= Html::a('<i class="fa fa-map"></i><span>Settings </span>
    		<span class="fa fa-angle-right" style="float: right"></span>', '#') ?>
    	<ul>
	        <li>
	        	<?= Html::a('<i class="fa fa-image"></i>Places', ['/place']) ?>
	        </li>
	        <li>
	        	<?= Html::a('<i class="fa fa-bookmark"></i>Blocks', ['/block']) ?>
	        </li>
	        <li>
	        	<?= Html::a('<i class="fa fa-home"></i>Lots', ['/lot']) ?>
	        </li> 
	        <li>
	        	<?= Html::a('<i class="fa fa-road"></i>Streets', ['/street']) ?>
	        </li> 
	        <li>
	        	<?= Html::a('<i class="fa fa-cog"></i>Nature of Cases', ['/nature-of-cases']) ?>
	        </li>
        </ul>
    </li>

<?php endif ?>




<?php if($user->type == 'midwife' || $user->type == 'staff'): ?>
    <li class="<?= in_array($page, ['equipment', 'medicine']) ? 'active-page' : '' ?>">
    	<?= Html::a('<i class="fa fa-dropbox"></i><span>Inventory</span> 
    		<span class="fa fa-angle-right" style="float: right"></span>', '#') ?>
    	<ul>
    		
    		<li>
	        	<?= Html::a('<i class="fa fa-shopping-cart"></i>Equipment Category', ['/equipment-category']) ?>
	        </li>

	        <li>
	        	<?= Html::a('<i class="fa fa-shopping-cart"></i>Equipments', ['/equipment']) ?>
	        </li>
	        <li>
	        	<?= Html::a('<i class="fa fa-medkit"></i>Medicine', ['/medicine']) ?>
	        </li>	

	        <?php if($user->type == 'midwife') : ?>
    			<li>
		        	<?= Html::a('<i class="fa fa-medkit"></i>Medicine Distribution', ['/distribution']) ?>
		        </li>
    		<?php endif ?>


	        <li>
	        	<?= Html::a('<i class="fa fa-medkit"></i>Medicine Category', ['/medicine-category']) ?>
	        </li> 
	        <li>
	        	<?= Html::a('<i class="fa fa-rocket"></i>Unit of Measurement', ['/unit']) ?>
	        </li>             
        </ul>
    </li>
<?php endif ?>

<?php if($user->type == 'head' || $user->type == 'staff' || $user->type == 'secretary'): ?>
    <li class="<?= $page == 'ID' ? 'active-page' : '' ?>">
    	<?= Html::a('<i class="fa fa-credit-card"></i><span>Identification Card</span>', ['/people/card']) ?>
    </li>
<?php endif ?>

<?php if($user->type == 'secretary'): ?>
    <li class="<?= $page == 'User' ? 'active-page' : '' ?>">
    	<?= Html::a('<i class="fa fa-user"></i><span>Users</span>', ['/user']) ?>
    </li>
<?php endif ?>