<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%complainant}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $blotter_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Complainant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%complainant}}';
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
            [['user_id',], 'required'],
            [['blotter_id'], 'integer'],
            [['created_at', 'updated_at', 'address'], 'safe'],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Complainant',
            'blotter_id' => 'Blotter ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
 
 
    public function getPeople()
    {
        return $this->hasOne(People::className(), ['id' => 'user_id']);
    }
}
