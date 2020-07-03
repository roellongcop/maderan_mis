<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%archive_medicine}}".
 *
 * @property int $id
 * @property int $medicine_id
 * @property string $reason
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class ArchiveMedicine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%archive_medicine}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['medicine_id', 'status', 'quantity'], 'integer'],
            [['reason'], 'required'],
            [['reason'], 'string'],
            [['quantity'], 'validateQuantity'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'medicine_id' => 'Medicine ID',
            'reason' => 'Reason',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function validateQuantity($attribute, $params)
    {
        $medicine = Medicine::findOne($this->medicine_id);


        if ($this->quantity > $medicine->quantity) {
            $this->addError($attribute, 'Quantity must less than or equal to medicine quantity ('.$medicine->quantity.')');
        }
    }

    public function getMedicine()
    {
        return $this->hasOne(Medicine::className(), ['id' => 'medicine_id']);
    }
}
