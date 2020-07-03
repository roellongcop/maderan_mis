<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%about}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $history
 */
class About extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%about}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description', 'photo'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png'],
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
            'name' => 'Name',
            'description' => 'Description',
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
 