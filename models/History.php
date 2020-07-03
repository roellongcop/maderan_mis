<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%history}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 */
class History extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%history}}';
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
            [['name', 'description'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['description', 'photo'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 20],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png'],
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
            'description' => 'Description',
            'status' => 'Status',
            'photo' => 'Photo',
            'image' => 'Upload Photo',
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->image) { 

            $path = Yii::$app->params['uploadPath'] . 
                $this->image->baseName . '.' . 
                $this->image->extension;

            $this->image->saveAs($path, false);

            $this->photo = $path;

            return true;
        }
        return false;
    }
}
