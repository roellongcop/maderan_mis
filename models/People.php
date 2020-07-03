<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%people}}".
 *
 * @property int $id
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property int $age
 * @property string $sex
 * @property string $mobile_no
 * @property string $tel_no
 * @property string $email
 * @property int $blk_id
 * @property int $lot_id
 * @property int $street_id
 * @property int $position_id
 * @property string $date_of_birth
 * @property string $place_of_birth
 * @property string $sss
 * @property string $tin
 * @property string $contact_person
 * @property string $contact_no
 * @property string $photo
 * @property string $status
 */

class People extends \yii\db\ActiveRecord
{
    public $image;
    public $people_name;
    public $people_id;
    public $occupant;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%people}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['fname', 'lname', 'sex', 'blk_id', 'lot_id', 'street_id', 'date_of_birth', 'place_of_birth', 'contact_person', 'contact_no', 'civil_status', 'height', 'weight', 'length_of_stay', 'income'], 'required'],


            [['status'], 'default', 'value' => 'active'],

            [['age', 'blk_id', 'lot_id', 'street_id', 'spouse_id', 'employment_id', 'is_resident', 'length_of_stay'], 'integer'],
            [['sex', 'place_of_birth', 'photo', 'civil_status'], 'string'],
            [['fname', 'mname', 'lname'], 'string', 'max' => 100],
            [['mobile_no', 'tel_no', 'contact_no', 'status'], 'string', 'max' => 20],
            [['email', 'contact_person'], 'string', 'max' => 200],
            [['date_of_birth'], 'string', 'max' => 10],
            [['income'], 'number'],
            [['weight', 'height', 'family_position'], 'string', 'max' => 32],
            [['sss', 'tin', 'relationship'], 'string', 'max' => 50],
            [['email',], 'email'],
            [['date_id_issued', 'occupation', 'occupant', 'control_no', 'religion'], 'safe'],
            

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
            'is_resident' => 'Is Resident ?',
            'fname' => 'First name',
            'mname' => 'Middle name',
            'lname' => 'Last name',
            'age' => 'Age',
            'civil_status' => 'Civil Status',
            'sex' => 'Sex',
            'mobile_no' => 'Mobile No',
            'tel_no' => 'Tel No',
            'email' => 'Email',
            'blk_id' => 'Blk',
            'lot_id' => 'Lot',
            'street_id' => 'Street',
            'position_id' => 'Family Position',
            'date_of_birth' => 'Date Of Birth',
            'place_of_birth' => 'Place Of Birth',
            'sss' => 'SSS',
            'tin' => 'TIN',
            'contact_person' => 'Guardian | Contact Person',
            'contact_no' => 'Contact No',
            'relationship' => 'Relationship',
            'photo' => 'Photo',
            'status' => 'Status',
            'image' => 'Upload Photo',
            'height' => 'Height (cm)',
            'weight' => 'Weight (kg)',
            'length_of_stay' => 'Lenght of Stay (years)'
        ];
    }

    public function get_is_resident()
    {
        return ($this->is_resident) ? 'Resident': 'Not-Resident';
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificates()
    {
        return $this->hasMany(Certificate::className(), ['user_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployments()
    {
        return $this->hasMany(Employment::className(), ['people_id' => 'id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOccupants()
    {
        return $this->hasMany(Occupant::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    public function getBarangayCaptain()
    {
        return People::find()
            ->alias('p')
            ->where(['po.name' => 'Captain'])
            ->innerJoin('{{%official}} AS o', 'o.people_id = p.id')
            ->innerJoin('{{%position}} AS po', 'o.position_id = po.id')
            ->one()->fullname;
    }

    public function getSpouse()
    {
        return $this->hasOne(People::className(), ['id' => 'spouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservation()
    {
        return $this->hasMany(Reservation::className(), ['people_id' => 'id']);
    }

    public function getAddress()
    {
        $address = '';
        if (($block = $this->block) != null) {
            $address .= 'Blk ' . $this->block->blk_no;
        }
        if (($lot = $this->lot) != null) {
            $address .= ' Lot ' . $this->lot->lot_no;
        }
        if (($street = $this->street) != null) {
            $address .= ' ' . $this->street->name;
        }
        return  ($address) ? $address: 'N/A'; 
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

    public function getFullname()
    {
        $fullname = $this->fname . ' ' . $this->mname . ' ' . $this->lname;

        return ucwords($fullname);
    }


    public static function dropDown($type = 'fullname', $is_resident = '')
    {
        if ($type == 'fullname') {
            $dropdown = People::find()
                ->select(['id', 'CONCAT(fname, " ", `mname`, " ", `lname`) fullname'])
                ->where(['status' => 'active'])
                ->andFilterWhere(['is_resident' => $is_resident])
                ->orderBy('fname', 'asc')
                ->asArray()
                ->all();

            $dropdown = ArrayHelper::map($dropdown, 'id' , 'fullname');
        } else {
            $dropdown = People::find()
                ->select(['id', $type])
                ->where(['status' => 'active'])
                ->orderBy($type, 'asc')
                ->distinct()
                ->asArray()
                ->all();

            $dropdown = ArrayHelper::map($dropdown, $type , $type);
        }
        return $dropdown;
    }


    // public function afterFind()
    // {
    //     foreach ($this->attributes as $key => $value) {
    //         $this->$key = strtoupper($this->$key);
    //     }
    //     parent::afterFind();
    // }

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


    public static function get($status = 'active')
    {
        return People::find()
            ->where(['status' => $status, 'is_resident' => 1])
            ->all();
    }

    public function getParents()
    {
        // if ($this->family_position == 'child') {
            $models = PeopleParent::findAll(['child_id' => $this->id]);
            $return = [];

            if ($models) {
                foreach ($models as $model) {
                    $return[] = People::findOne($model->parent_id);
                }
            }
            return $return;
        // }
    }


    public function getSiblings()
    {
        // if ($this->family_position == 'parent') {
            $models = PeopleParent::findAll(['parent_id' => $this->id]);

            $return = [];

            if ($models) {
                foreach ($models as $model) {
                    $return[] = People::findOne($model->child_id);
                }
            }

            return $return;
        // }
    }

    public function getComplainants()
    {
        return $this->hasMany(Complainant::className(), ['user_id' => 'id']);
    }


    public function getBlotters()
    {
        return $this->hasMany(Blotter::className(), ['id' => 'blotter_id'])
            ->via('complainants');
    }


    public function getRespondents()
    {
        return $this->hasMany(Respondent::className(), ['user_id' => 'id']);
    }


    public function getBlottersAsRespondent()
    {
        return $this->hasMany(Blotter::className(), ['id' => 'blotter_id'])
            ->via('respondents');
    }


    

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) { 
            if ($this->status == 'In-active') {
                $this->is_resident = 0;
            }
            else {
                $this->is_resident = 1;
            }

            // if ($this->isNewRecord) {
                $max_id = People::find()->max('id');
                
                $control_no = Yii::$app->template->invoice_num(($max_id + 1), 5);

                $this->control_no = date('Y') . '-' . date('m') . '-' . $control_no;
            // }

            $birthday = new \DateTime($this->date_of_birth);
            $current_date = new \DateTime('now'); 

            $age = $birthday->diff($current_date);

            $this->age =  $age->format("%Y");
            
            return true;
        }
        return false;
    }


    public static function fetch($key='id', $value="control_no")
    {
        $models = People::find()
            ->where(['status' => 'active'])
            ->andFilterWhere(['is_resident' => 1])
            ->orderBy([$value => SORT_ASC])
            ->all();

        $models = ArrayHelper::map($models, $key , $value);
       
        return $models;
    }
}
