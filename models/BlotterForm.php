<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class BlotterForm extends Model
{
    public $name;
    public $address;
    public $contact_no;
    public $type;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['name', 'address',], 'required'],

            [['contact_no', 'name', 'address', 'type'], 'string'],
        ];
    }

    
}
