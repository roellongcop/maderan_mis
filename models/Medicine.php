<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%medicine}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 * @property string $expiration_date
 * @property string $status
 * @property string $date_added
 * @property string $date_updated
 */
class Medicine extends \yii\db\ActiveRecord
{
    public $relatedModels = ['ArchiveMedicine', 'Distribution'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%medicine}}';
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
            [['name', 'description', 'category_id', 'expiration_date', 'unit_id', 'price', 'quantity', 'batch_no'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['description'], 'string'],
            [['category_id', 'price', 'quantity', 'unit_id'], 'integer'],
            [['expiration_date', 'date_added', 'date_updated', 'archive_reason','archived_status', 'archive_quantity'], 'safe'],
            [['batch_no'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 200],
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
            'price' => 'Price',
            'quantity' => 'Quantity',
            'unit_id' => 'Unit of Measurement',
            'description' => 'Description',
            'category_id' => 'Category',
            'expiration_date' => 'Expiration Date',
            'batch_no' => 'Batch No',
            'status' => 'Status',
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

            if ($this->quantity <= 0) {
                $this->quantity = 0;
                
                if (! $this->isNewRecord) {
                    $archived = new ArchiveMedicine();
                    $archived->medicine_id = $this->id;
                    $archived->quantity = 0;
                    $archived->reason = 'Out of Stock';
                    $archived->save();
                }
            }
            return true;
        }

        return false;
    }

    public static function get($status = 'active')
    {
        return self::find()
            ->where(['status' => $status])
            ->all();
    }

    public function getCanDelete()
    {
        $res = [];

        foreach ($this->relatedModels as $model) {
            $mod = "\app\\models\\". $model;
            
            $_model = $mod::find()
                ->where(['medicine_id' => $this->id])
                ->one();

            if ($_model) {
                $res[] = $model;
            }
        }

        return ($res) ? false: true;
    }

    public function getCanUpdate()
    {
        return true;
    }


    public function getCanView()
    {
        return true;
    }
}
