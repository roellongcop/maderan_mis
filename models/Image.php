<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property int $id
 * @property string $path
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'name'], 'required'],
            [['path', 'name'], 'string'],
            [['date_added'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'name' => 'Image Name',
            'date_added' => 'Date Added',
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                $this->date_added = date('Y-m-d H:i:s');
            }
        }

        return true;
    }
}
