<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%lot}}".
 *
 * @property int $id
 * @property int $block_id
 * @property string $lot_no
 * @property string $description
 * @property string $status
 */
class Lot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lot}}';
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
            [['block_id', 'lot_no', 'description'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['block_id'], 'integer'],
            [['description'], 'string'],
            [['lot_no', 'status'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_id' => 'Block No',
            'lot_no' => 'Lot No',
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
        return $this->hasOne(Place::className(), ['lot_id' => 'id']);
    }


    public static function dropDown()
    {
        $dropdown = self::find()
            ->where(['status' => 'active'])
            ->orderBy('lot_no', 'asc')
            ->all();

        $dropdown = ArrayHelper::map($dropdown, 'id' , 'lot_no');

        return $dropdown;
    }
}
