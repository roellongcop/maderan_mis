<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%equipment}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 * @property int $is_rentable
 * @property string $status
 * @property string $image
 * @property string $date_added
 * @property string $date_updated
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%equipment}}';
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
            [['name', 'description', 'category_id', 'is_rentable', 'unit_id', 'quantity'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['description', 'image'], 'string'],
            [['category_id', 'rent_price', 'unit_id', 'is_rentable', 'quantity'], 'integer'],
            [['date_added', 'date_updated'], 'safe'],
            [['name', 'image'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 20],
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
            'unit_id' => 'Unit of Measurement',
            'description' => 'Description',
            'category_id' => 'Category',
            'is_rentable' => 'Is Rentable',
            'status' => 'Status',
            'rent_price' => 'Rent Price',
            'image' => 'Image',
            'date_added' => 'Date Added',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                $this->date_added = date('Y-m-d H:i:s');
            }
            $this->date_updated = date('Y-m-d H:i:s');
        }

        return true;
    }

    public static function all($value='')
    {
        return Equipment::find()
            ->all();
    }

    public static function get($status, $array = true)
    {
        $where = ($status) ? 
            ['e.status' => $status] :
            ['e.status' => 'active', 'e.is_rentable' => 1];

        if ($array == true) {
            return self::find()
                ->alias('e')
                ->where($where)
                ->andFilterWhere(['>', 'quantity', 0])
                ->innerJoinWith('category')
                ->innerJoinWith('unit')
                ->asArray()
                ->all();
        } else {
            return self::find()
                ->alias('e')
                ->where($where)
                ->innerJoinWith('category')
                ->innerJoinWith('unit')
                ->all();
        }
    }
}
