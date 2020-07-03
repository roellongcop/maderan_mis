<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%employment}}".
 *
 * @property int $id
 * @property string $company_name
 * @property string $duration_from
 * @property string $duration_to
 * @property string $address
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Employment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%employment}}';
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
            [['company_name', 'duration_from', 'address', 'people_id'], 'required'],
            [['duration_from', 'duration_to', 'created_at', 'updated_at'], 'safe'],
            [['address'], 'string'],
            [['status', 'people_id'], 'integer'],
            [['company_name'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'duration_from' => 'From',
            'duration_to' => 'To',
            'address' => 'Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
