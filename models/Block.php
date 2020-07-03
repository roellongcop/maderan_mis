<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%block}}".
 *
 * @property int $id
 * @property string $blk_no
 * @property string $description
 * @property string $status
 */
class Block extends \yii\db\ActiveRecord
{

    public $relatedModels1 = ['Lot'];
    public $relatedModels2 = ['Place'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%block}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blk_no', 'description'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['description'], 'string'],
            [['blk_no', 'status'], 'string', 'max' => 20],
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
            'blk_no' => 'Blk No',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['blk_id' => 'id']);
    }

    public static function dropDown()
    {
        $dropdown = self::find()
            ->where(['status' => 'active'])
            ->orderBy('blk_no', 'asc')
            ->all();

        $dropdown = ArrayHelper::map($dropdown, 'id' , 'blk_no');

        return $dropdown;
    }


    public function getCanDelete()
    {
        $res = [];

        foreach ($this->relatedModels1 as $model) {
            $mod = "\app\\models\\". $model;
            
            $_model = $mod::find()
                ->where(['block_id' => $this->id])
                ->one();

            if ($_model) {
                $res[] = $model;
            }
        }

        foreach ($this->relatedModels2 as $model) {
            $mod = "\app\\models\\". $model;
            
            $_model = $mod::find()
                ->where(['blk_id' => $this->id])
                ->one();

            if ($_model) {
                $res[] = $model;
            }
        }

        return ($res) ? false: $res;
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
