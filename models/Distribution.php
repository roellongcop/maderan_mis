<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%distribution}}".
 *
 * @property int $id
 * @property int $medicine_id
 * @property int $people_id
 * @property int $quantity
 * @property string $date
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Distribution extends \yii\db\ActiveRecord
{
    public $search;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%distribution}}';
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
            [['medicine_id', 'people_id', 'quantity', 'date', 'status'], 'required'],
            [['medicine_id', 'people_id', 'quantity', 'status'], 'integer'],
            [['date', 'created_at', 'updated_at', 'search'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'search' => 'Search People',
            'medicine_id' => 'Medicine',
            'people_id' => 'People',
            'quantity' => 'Quantity',
            'date' => 'Date',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getPeople()
    {
        return $this->hasOne(People::className(), ['id' => 'people_id']);
    }

    public function getMedicine()
    {
        return $this->hasOne(Medicine::className(), ['id' => 'medicine_id']);
    }
}
