<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $id
 * @property string $name
 * @property string $access
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }
 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'access',], 'required'],
            [['status'], 'integer'],
            [['status'], 'default', 'value' => 1],
            [['created_at', 'updated_at', 'status', 'access', 'role_access'], 'safe'],
            [['name'], 'string', 'max' => 32],
        ];
    } 
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'access' => 'access',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function afterFind()
    {
        $this->access = json_decode($this->access, TRUE);
        $this->role_access = json_decode($this->role_access, TRUE);

        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        $this->access = json_encode($this->access);
        $this->role_access = json_encode($this->role_access);

        return parent::beforeSave($insert);
    }
}
