<?php
namespace app\components;

use Yii; 
use app\models\About;
use app\models\Equipment;
use app\models\Place;
use app\models\People;
use app\models\PeopleParent;
use app\models\Official;
use yii\helpers\FileHelper;
use yii\helpers\Inflector;
use yii\helpers\ArrayHelper;

class Template extends \yii\base\Component
{

	public function photo($profile='')
	{
		if (!$profile) {
			$profile = Yii::$app->params['default']['profile'];
		}

		return Yii::$app->urlManager->baseUrl . '/' . $profile;
	}
	public function getAbout($field)
	{
		$default = Yii::$app->params['default'];
		$model =  About::find()
			->where(['id' => 1])
			->asArray()
			->one();

		if (isset($model[$field])) {
			return $model[$field];
		}
		
		if (isset($default[$field])) {
			return $default[$field];
		}

		return '';

	}

	public function fullName($people)
	{
		if($people) {
			return ucwords($people->fname . ' ' . $people->mname . ' ' . $people->lname);
		}
	}

	public function address($address)
	{
		return ucwords('Blk ' . (($address->block) ? $address->block->blk_no: '') . ', Lot ' . 
			(($address->lot)? $address->lot->lot_no: '') . ' ' . (($address->street)? $address->street->name: '') . ' St.');
	}

	public function reservedEntity($reservation , $attr = 'name')
	{
		if ($reservation->type == 'equipment') {
			$model = Equipment::findOne($reservation['reference_id']);
		} 
		else {
			$model = Place::findOne($reservation['reference_id']);
		}

		return $model ? $model->$attr: NULL;
	}

	public function official($position='', $get="one")
	{
		$model = Official::find()
			->where(['position' => $position])
			->$get();

		if ($get == "one") {
			if ($model) {
				return $model->people ? $model->people->fullname: '';
			}
			return '';
		}

		return $model;
	}

	public function getBarangay($position, $res="one")
    {
        $record =  People::find()
            ->alias('p')
            ->where(['po.name' => $position])
            ->innerJoin('{{%official}} AS o', 'o.people_id = p.id')
            ->innerJoin('{{%position}} AS po', 'o.position_id = po.id')
            ->$res();

        if ($res == 'one') {
        	return $record? strtoupper($record->fullname): '';
        }

        return $record? $record: [];
    }

   
    public function checkPeople($people='', $id)
    {
    	if ($people->family_position == 'parent') {
    		$where = ['child_id' => $id, 'parent_id' => $people->id];
    	}
    	elseif ($people->family_position == 'child') {
    		$where = ['parent_id' => $id, 'child_id' => $people->id];
    	}

    	$models = PeopleParent::findOne($where);

		return $models;
    }


    public function showMenu($menu, $sub=false)
    {
    	if ($sub == false) {
    		$controller = explode('/', $menu['route'][0])[0];
    		$action = explode('/', $menu['route'][0])[1];
    		
	    	return Yii::$app->access->user_can($action, $controller);
    	}


    	if ($sub == true) {
    		$routes = array_values(ArrayHelper::map($menu['sub'], 'label', 'route'));
	    	foreach ($routes as $route) {
	    		$controller = explode('/', $route[0])[0];
	    		$action = explode('/', $route[0])[1];

	    		return Yii::$app->access->user_can($action, $controller);
	    	}
    	}

    	return false;
    	
    }


    public function computeAge($birthday)
    {
        $birthday = new \DateTime($birthday);
        $current_date = new \DateTime(); 

        $age = $birthday->diff($current_date);

        return $age->format("%Y");
    }



    public function invoice_num($input='', $pad_len = 5, $prefix = null) 
    {
	    if ($pad_len <= strlen($input))
	        trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

	    if (is_string($prefix))
	        return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

	    return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
	}
	 

}