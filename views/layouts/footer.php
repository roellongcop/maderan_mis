<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
$page = Yii::$app->controller->id; 
$user = Yii::$app->user->identity;

$page = isset($this->params['page']) && $this->params['page'] == 'ID' ? 'ID': $page;
$route = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
?>

				</div>
			</div>
		</div>
		<div class="copyrights">
			 <p>© <?= date('Y') ?> <?= Yii::$app->template->getAbout('name') ?>. All Rights Reserved</p>
		</div>	
		</div>
	</div>


<!--slider menu-->
    <div class="sidebar-menu"> 
	  	<div class="logo"> 
	  		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 

		  </a> 
		</div>		  
	    <div class="menu">
	      	<ul id="menu" >
	      		<?php foreach (Yii::$app->params['menus'] as $menu) : ?>
			        	

		      		<li class="<?= isset($menu['sub'])? (in_array([$route], array_values(ArrayHelper::map($menu['sub'], 'label', 'route'))))? 'active-page': '': ([$route] == $menu['route']) ? 'active-page': '' ?>">

			        	<?php if(isset($menu['sub'])): ?>
			        		<?php if(Yii::$app->template->showMenu($menu, true)): ?>
			        			<?= Html::a('<i class="'.$menu['icon'].'"></i><span>'.$menu['label'].'</span>' . (isset($menu['sub']) ? '<span class="fa fa-angle-right" style="float: right"></span>': ''), $menu['route']) ?>
			        		<?php endif ?>
			        	<?php elseif(Yii::$app->template->showMenu($menu)): ?>
			        		<?= Html::a('<i class="'.$menu['icon'].'"></i><span>'.$menu['label'].'</span>' . (isset($menu['sub']) ? '<span class="fa fa-angle-right" style="float: right"></span>': ''), $menu['route']) ?>
		      			<?php endif ?>


			        	

			        	<?php if(isset($menu['sub'])): ?>
			        		<ul>
			      				<?php foreach ($menu['sub'] as $sub) : ?>
			        				<?php if(Yii::$app->template->showMenu($sub)): ?>
				      					<li class="<?= ([$route] == $sub['route']) ? 'active': '' ?>">
								        	<?= Html::a('<i class="'.$sub['icon'].'"></i>'.$sub['label'].'', $sub['route']) ?>
								        </li>
		      						<?php endif ?>
			      				<?php endforeach; ?>
			        		</ul>

			        	<?php endif; ?>

			        </li>
		      	<?php endforeach; ?> 


	       <!--  $this->render('_menu')  -->

	      </ul>
	    </div>
	 </div>
	<div class="clearfix"> </div>
</div>