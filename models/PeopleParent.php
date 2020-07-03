<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%people_parent}}".
 *
 * @property int $id
 * @property int $child_id
 * @property int $parent_id
 */
class PeopleParent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%people_parent}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['child_id', 'parent_id'], 'required'],
            [['child_id', 'parent_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'child_id' => 'Child ID',
            'parent_id' => 'Parent ID',
        ];
    }
}
