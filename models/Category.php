<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $status
 */
class Category extends \yii\db\ActiveRecord
{
    public $relatedModels = ['Equipment', 'Medicine'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }


    // public function afterFind()
    // {
    //     foreach ($this->attributes as $key => $value) {
    //         $this->$key = strtoupper($this->$key);
    //     }
    //     parent::afterFind();
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'type'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Category Name',
            'description' => 'Description',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    public static function dropDown($type = 'equipment')
    {
        $dropdown = Category::find()
            ->where(['status' => 'active', 'type' => $type])
            ->orderBy('name', 'asc')
            ->all();

        $dropdown = ArrayHelper::map($dropdown, 'id' , 'name');

        return $dropdown;
    }


    public function getCanDelete()
    {
        $res = [];

        foreach ($this->relatedModels as $model) {
            $mod = "\app\\models\\". $model;
            
            $_model = $mod::find()
                ->where(['category_id' => $this->id])
                ->one();

            if ($_model) {
                $res[] = $model;
            }
        } 
        return ($res) ? false: true;
    }

    public function getCanUpdate()
    {
        return true;
    }


    public function getCanView()
    {
        return true;
    }

}
