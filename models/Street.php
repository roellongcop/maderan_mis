<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%street}}".
 *
 * @property int $id
 * @property int $block_id
 * @property string $name
 * @property string $description
 * @property string $status
 */
class Street extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%street}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['block_id', 'name', 'description'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['block_id'], 'integer'],
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
            'block_id' => 'Block ',
            'name' => 'Street Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlock()
    {
        return $this->hasOne(Block::className(), ['id' => 'block_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['street_id' => 'id']);
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
}
