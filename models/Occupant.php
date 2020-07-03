<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%occupant}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $occupant_id
 * @property string $type
 */
class Occupant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%occupant}}';
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
            [['user_id', 'occupant_id', 'type'], 'required'],
            [['user_id', 'occupant_id'], 'integer'],
            [['type'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'occupant_id' => 'Occupant ID',
            'type' => 'Type',
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPeople()
    {
        return $this->hasOne(People::className(), ['id' => 'user_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getOccupantPeople()
    {
        return $this->hasOne(People::className(), ['id' => 'occupant_id']);
    }
}
