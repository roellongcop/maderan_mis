<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%official}}".
 *
 * @property int $id
 * @property int $people_id
 * @property int $position_id
 * @property string $status
 */
class Official extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%official}}';
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
            [['people_id', 'position'], 'required'],
            [['status'], 'default', 'value' => 'active'],
            [['people_id', 'position_id'], 'integer'],
            [['status'], 'string', 'max' => 20],
            [['position'], 'validatePosition'],
            [['status', 'position'], 'string', 'max' => 2640],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'people_id' => 'People',
            'position_id' => 'Position',
            'status' => 'Status',
        ];
    }

    public function validatePosition($attribute, $params)
    {
        $model = Official::find()
            ->where(['position' => $this->position, 'status' => 'active'])
            ->count();

        if (in_array($this->position, ['captain', 'secretary', 'treasurer', 'sk_chairman']) && $model >= 1 ) {
            $this->addError($attribute, $this->_position . ' Already Exist.');
        }
        else if ($this->position == 'sb_member' && $model >= 7) {
            $this->addError($attribute, 'There are  '. $model . ' '. $this->_position . ' Already Exist.');
        }            
    }

    public function get_position($value='')
    {
        return Yii::$app->params['position']['official'][$this->position];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::className(), ['id' => 'people_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }
}
