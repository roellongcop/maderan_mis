<?php
namespace app\components;

use Yii; 
use yii\helpers\FileHelper;
use yii\helpers\Inflector;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class Access extends \yii\base\Component
{
	
    public function controllerActions($res = [])
	{
		$controllers = FileHelper::findFiles(Yii::getAlias('@app/controllers'), [
			'recursive' => true
		]);

		foreach ($controllers as $key => $controller) {
			$contents = file_get_contents($controller);
			$controller_ID = Inflector::camel2id(substr(basename($controller), 0, -14));
			preg_match_all('/public function action(\w+?)\(/', $contents, $result);
			
			foreach ($result[1] as $action) {
				$action_ID = Inflector::camel2id($action);

				if($action_ID !== 's') {
					$res[$controller_ID][] = $action_ID;
				}
			}
		}
 
		return $res;
	}

	 

	public function actions($controller="", $user='')
	{ 
		$access = ($user==='') ? $this->controllerActions():$user->roleAccess;

		$controller = ($controller === "") ? Yii::$app->controller->id : $controller;

		return isset($access[$controller]) ? $access[$controller]: [''];
	}
 	

 	public function behaviors($actions=[''], $verb_actions="")
 	{

 		return [
 			'access' => $this->_access($actions),
            'verbs' => $this->verbs($verb_actions)
        ];
 	}

 	public function verbs($verb_actions="")
 	{
 		$actions = $verb_actions === "" ? ['delete' => ['POST']] : $verb_actions;

 		return [
            'class' => VerbFilter::className(),
            'actions' => $actions,
        ];
 	}

 	public function _access($actions=[''])
 	{
 		$user = Yii::$app->user->isGuest ? '' : Yii::$app->user->identity;
 		return [
			'class' => AccessControl::className(),
			'only' => $this->actions(),
            'rules' => [
                [
                    'actions' => $this->actions('', $user),
                    'allow' => true,
                    'roles' => ['@'],
				],
				[
                    'actions' => $actions,
                    'allow' => true,
                    'roles' => ['?'],
				],
            ],
		];
 	}

 	public function user_can($action='', $controller='')
 	{
		$action = ($action === '') ? Yii::$app->controller->action->id : $action;
		$controller = ($controller === '') ? Yii::$app->controller->id : $controller;

		$access = Yii::$app->user->identity->roleAccess;


		if (isset($access[$controller])) {
			return in_array($action, $access[$controller]);
		}

		return FALSE;
 	}


 	



 	public function button($names=[], $params=[])
 	{
 		$controller = isset($params['controller']) ? $params['controller']: Yii::$app->controller->id;

 		$names = is_array($names) ? $names: [$names];

 		$buttons = [];
 		foreach ($names as $name) {


 			switch ($name) {
 				case 'index':
 					$title = isset($params['index_title']) ? $params['index_title'] : 'List';
 					$options = isset($params['index_options']) ? $params['index_options'] : ['class' => 'btn btn-white'];
 					$url = [$controller . '/' . $name];
	 				
	 				break;

 				case 'create':
 					$title = isset($params['create_title']) ? $params['create_title'] : ucwords($name . ' ' . str_replace('-', ' ', $controller)) ;
 					$options = isset($params['create_options']) ? $params['create_options'] : ['class' => 'btn btn-success'];
 					$url = [$controller . '/' . $name];

	 				break;

	 			case 'view':
 					$title = isset($params['view_title']) ? $params['view_title'] : ucwords($name);
 					$options = isset($params['view_options']) ? $params['view_options'] : ['class' => 'btn btn-info'];
 					$url = [$controller . '/' . $name, 'id' => $params['model']->id];
	 				
	 				break;

				case 'update':
 					$title = isset($params['update_title']) ? $params['update_title'] : ucwords($name);
 					$options = isset($params['update_options']) ? $params['update_options'] : ['class' => 'btn btn-primary'];
 					$url = [$controller . '/' . $name, 'id' => $params['model']->id];
	 				
	 				break;

				case 'delete':
					
 					$title = isset($params['delete_title']) ? $params['delete_title'] : ucwords($name);
 					$options = isset($params['delete_options']) ? $params['delete_options'] : [
 						'class' => 'btn btn-danger',
 						'data' => [
			                'confirm' => 'Are you sure you want to delete this '.ucwords($controller).'?',
			                'method' => 'post',
			            ]
 					];
 					$url = [$controller . '/' . $name, 'id' => $params['model']->id];
	 				
	 				break;
	 			
	 			default:
	 				# code...
	 				break;
	 		}

	 		$buttons[] = $this->anchor([
 				'title' => $title,
 				'url' => $url,
 				'options' => $options
 			]);
 		}

 		return implode(' ', $buttons);
 	}


 	public function anchor($params)
 	{

 		$url = $params['url'][0];
 		$controller = explode('/', $url)[0];
 		$action = explode('/', $url)[1];
 		$options = isset($params['options']) ? $params['options']: NULL;


 		if ($this->user_can($action, $controller)) {
 			return \yii\helpers\Html::a($params['title'], $params['url'], $options);
 		}

 	}






 	public function tableButton($model, $params=[])
 	{
 		$controller = isset($params['controller']) ? $params['controller']: Yii::$app->controller->id;
 		$template = isset($params['template']) ? $params['template']: ['view', 'update', 'delete'];

 		return $this->button($template, [
 			'controller' => $controller,
 			'model' => $model,
			'view_title' => '<i class="fa fa-th-large"></i>',
			'view_options' => ['class' => 'btn btn-info btn-sm', 'title' => 'View'],
			'update_title' => '<i class="fa fa-edit"></i>',
			'update_options' => ['class' => 'btn btn-primary btn-sm', 'title' => 'Update'],
			'delete_title' => '<i class="fa fa-trash"></i>',
			'delete_options' => [
				'class' => 'btn btn-danger btn-sm', 
				'title' => 'Delete', 
				'data' => [
					'confirm' => 'Are you sure you want to delete this item?',
					'method' => 'post',
				]
			],

		]);
 	}

 	public function gridColumns($params=[])
 	{
 		$controller = isset($params['controller']) ? $params['controller']: Yii::$app->controller->id;

 		$template = isset($params['template']) ? $params['template']: '{view} {update} {delete}';



 		$use = [
 			'controller' => $controller
 		];


 		return [
            'class' => 'yii\grid\ActionColumn',
            'template' => $template,
            'buttons' => [
            	
                'view' => function($url, $model) use($use) {
                    return $this->anchor([
                    	'title' => '<i class="fa fa-th-large"></i>',
                    	'url' => [$use['controller'] . '/' . 'view', 'id' => $model->id],
                    	'options' => ['class' => 'btn btn-info btn-sm']
                    ]);
                },
                'update' => function($url, $model) use($use) {
                    return $this->anchor([
                    	'title' => '<i class="fa fa-edit"></i>',
                    	'url' => [$use['controller'] . '/' . 'update', 'id' => $model->id],
                    	'options' => ['class' => 'btn btn-primary btn-sm']
                    ]);
                },
                'delete' => function($url, $model) use($use) {
                    return $this->anchor([
                    	'title' => '<i class="fa fa-trash"></i>',
                    	'url' => [$use['controller'] . '/' . 'delete', 'id' => $model->id],
                    	'options' => [
                    		'class' => 'btn btn-danger btn-sm', 
                    		'data' => [
								'confirm' => 'Are you sure you want to delete this item?',
								'method' => 'post',
							]
						]
                    ]);
                },

            ]
        ];
 	}
	 

}