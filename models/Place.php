<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%place}}".
 *
 * @property int $id
 * @property string $name
 * @property int $blk_id
 * @property int $lot_id
 * @property int $street_id
 * @property int $is_rentable
 * @property double $rent_price
 * @property string $status
 */
class Place extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%place}}';
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
            [['name', 'blk_id', 'lot_id', 'street_id', 'is_rentable', 'rent_price', 'description'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['blk_id', 'lot_id', 'street_id', 'is_rentable'], 'integer'],
            [['rent_price'], 'number'],
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
            'blk_id' => 'Blk #',
            'lot_id' => 'Lot #',
            'street_id' => 'Street',
            'is_rentable' => 'Is Rentable',
            'rent_price' => 'Rent Price',
            'status' => 'Status',
            'photo' => 'Photo',
            'image' => 'Upload Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery  
     */
    public function getBlock()
    {
        return $this->hasOne(Block::className(), ['id' => 'blk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLot()
    {
        return $this->hasOne(Lot::className(), ['id' => 'lot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreet()
    {
        return $this->hasOne(Street::className(), ['id' => 'street_id']);
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

   


    public static function get($status = 'active', $array = true)
    {
        if ($array == true) {
            return self::find()
                ->alias('p')
                ->where(['p.status' => $status, 'p.is_rentable' => 1])
                ->innerJoinWith('block')
                ->innerJoinWith('lot')
                ->innerJoinWith('street')
                ->asArray()
                ->all();
        } else {
            return self::find()
                ->alias('p')
                ->where(['p.status' => $status, 'p.is_rentable' => 1])
                ->innerJoinWith('block')
                ->innerJoinWith('lot')
                ->innerJoinWith('street')
                ->all();
        }
    }
}
