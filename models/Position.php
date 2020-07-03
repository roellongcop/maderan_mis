<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%position}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%position}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'type'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['description', 'type'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['name'], 'unique'],
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
            'name' => 'Position',
            'description' => 'Description',
            'status' => 'Status',
            'type' => 'Type'
        ];
    }


    public static function dropDown($type = 'family')
    {
        $dropdown = Position::find()
            ->where(['status' => 'active', 'type' => $type])
            ->orderBy('name', 'asc')
            ->all();

        $dropdown = ArrayHelper::map($dropdown, 'id' , 'name');

        return $dropdown;
    }
}
