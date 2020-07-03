<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%unit}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 */
class Unit extends \yii\db\ActiveRecord
{
    public $relatedModels = ['Equipment', 'Medicine'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%unit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 20],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Unit of Measurement',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    public static function dropDown()
    {
        $dropdown = self::find()
            ->where(['status' => 'active'])
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
                ->where(['unit_id' => $this->id])
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
