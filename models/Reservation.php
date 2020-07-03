<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%reservation}}".
 *
 * @property int $id
 * @property int $people_id
 * @property string $date_from
 * @property string $date_to
 * @property int $equipment_id
 * @property string $status
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%reservation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['people_id', 'date_from', 'date_to', 'reference_id', 'type'], 'required'],
            [['reference_id', 'quantity'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
            [['status', 'type'], 'string', 'max' => 20],
            [['status',], 'default', 'value' => 'active'],
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
            'people_id' => 'Resident',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'reference_id' => 'Reserved Entity',
            'status' => 'Status',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResident()
    {
        return $this->hasOne(People::className(), ['id' => 'people_id']);
    }

    public function getEquipment()
    {
        if ($this->type == 'equipment') {
            return $this->hasOne(Equipment::className(), ['id' => 'reference_id']);
        }
    }

    public function getPlace()
    {
        if ($this->type == 'place') {
            return $this->hasOne(Place::className(), ['id' => 'reference_id']);
        }
    }


    public static function get($status = 'reserved')
    {
        return self::find()
            ->where(['status' => $status])
            ->all();
    }


    public static function getByResident($people_id, $type = 'equipment', $status = 'reserved')
    {
        $where = [
            'people_id' => $people_id, 
            'type' => $type, 
            'status' => $status
        ];


        return self::find()
            ->where($where)
            ->all();
    }
}
