<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blotter}}".
 *
 * @property int $id
 * @property string $complainant
 * @property string $respondent
 * @property int $nature_of_case
 * @property int $action_taken
 * @property int $remarks
 * @property string $case_no
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Blotter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blotter}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nature_of_case', 'remarks', 'description', 'action_taken', 'in_charge', 'date_happen', 'time_happen'], 'required'],
            [['created_at', 'updated_at'], 'safe'],

            [['nature_of_case', 'action_taken', 'remarks', 'status'], 'number', 'max' => 9],

            [['case_no'], 'string', 'max' => 32],
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
            'complainant' => 'Complainant',
            'description' => 'Description',
            'in_charge', 'In-Charge',
            'respondent' => 'Respondent',
            'nature_of_case' => 'Nature Of Case',
            'action_taken' => 'Action Taken',
            'remarks' => 'Remarks',
            'case_no' => 'Case No',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function getInCharge()
    {
        return $this->hasOne(User::className(), ['id' => 'in_charge']);
    }

    public function getNatureOfCases()
    {
        return $this->hasOne(NatureOfCases::className(), ['id' => 'nature_of_case']);
    }
    public function get_nature_of_case()
    {
        if (($case = $this->natureOfCases) != NULL) {

            return $case->name;
        }
    }

    public function get_action_taken()
    {
        if ($this->action_taken) {
            return Yii::$app->params['action_taken'][$this->action_taken];
        }
    }

    public function get_remarks()
    {
        if ($this->remarks) {
            return Yii::$app->params['remarks'][$this->remarks];
        }
    }


    public function getComplainants()
    {
        return $this->hasMany(Complainant::className(), ['blotter_id' => 'id']);
    }

    public function getRespondents()
    {
        return $this->hasMany(Respondent::className(), ['blotter_id' => 'id']);
    }


    public function getComplainantList($res='')
    {
        $complainants = $this->complainants;
        if ($complainants) {
            foreach ($complainants as $complainant) {
                $res .= "<p>";
                if($complainant->people) {

                    $res .= $complainant->people->fullname;
                }
                $res .= "</p>";
            }
        }

        return $res;
    }


    public function getRespondentList($res='')
    {
        $respondents = $this->respondents;
        
        if ($respondents) {
            foreach ($respondents as $respondent) {
                $res .= "<p>";
                if($respondent->people) {
                    $res .= $respondent->people->fullname;
                }
                $res .= "</p>";
            }
        }

        return $res;
    }
    
}
