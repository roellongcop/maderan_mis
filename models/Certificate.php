<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%certificate}}".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%certificate}}';
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
            [['name', 'user_id'], 'required'],
            [['purpose'], 'required', 'on' => 'residency'],
            [['purpose'], 'string'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at', 'purpose', 'business_name', 'business_foreclosed', 'business_address', 'partner_since', 'partner_id', 'child_name', 'child_born', 'child_relationship', 'resident_since', 'living_together', 'findings', 'others'], 'safe'],
            [['name', 'business_name'], 'string', 'max' => 191],
            [['status'], 'integer', 'max' => 9],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Certificate',
            'purpose' => 'Purpose',
            'living_together' => 'Living Together for (years, mos)',
            'child_name' => 'Child Name',
            'findings' => 'Findings',
            'child_born' => 'Child Birthday',
            'resident_since' => 'Resident Since',
            'child_relationship' => 'Child Relationship',
            'partner_id' => 'Partner Name',
            'partner_since' => 'Partner Since',
            'business_name' => 'Business Name',
            'business_address' => 'Business Address',
            'business_foreclosed' => 'Foreclosed On',
            'user_id' => 'Resident',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function get_purpose()
    {
        return Yii::$app->params['purpose'][$this->purpose];
    }

    public function getPeople()
    {
        return $this->hasOne(People::className(), ['id' => 'user_id']);
    }

    public function getPartner()
    {
        return $this->hasOne(People::className(), ['id' => 'partner_id']);
    }

    public function get_name()
    {
        if ($this->name) {
            return ucwords(Yii::$app->params['certificates'][$this->name]);
        }
    }


   


    
}
