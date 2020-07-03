<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $user
 *
 * @property Sales[] $sales
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $password_confirm;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
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
            [['username', 'password', 'password_confirm', 'role_id'], 'required'],
            [['username', 'password', 'type', 'password_confirm', 'status'], 'string'],
            [['username', 'authKey', 'accessToken'], 'unique'],
            [['authKey', 'accessToken'], 'string', 'max' => 200],
            [['password', 'password_confirm'], 'checkPassword'],
            [['password'], 'string', 'min' => 4],
            [['status'], 'default', 'value' => 'active'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role | User type',
            'username' => 'Username',
            'password' => 'Password',
            'password_confirm' => 'Confirm Password',
            'type' => 'Usertype',
        ];
    }

     /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        return null;
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if (($model = User::findOne(['accessToken' => $token])) !== null) {
            return $model;
        }
        return null;
    }

    public function checkPassword($attribute, $params)
    {
        if ($this->password_confirm != $this->password) {
            $this->addError($attribute, 'Password Not Match');
        }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }


    /**
     * Set password
     *
     */
    public function setPassword()
    {
        $this->password = Yii::$app->security->generatePasswordHash($this->password);
    }

    public function getRole($value='')
    {
        return $this->hasOne(ROle::className(), ['id' => 'role_id']);
    }

    public function getRoleAccess()
    {
        if (($role = $this->role) != NULL) {
            return $role->access;
        }
    }

    public function getRoleName()
    {
        if (($role = $this->role) != NULL) {
            return $role->name;
        }
    }
 

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->password = Yii::$app->security->generatePasswordHash($this->password);
            $this->authKey = strtoupper(Yii::$app->security->generateRandomString(10));
            $this->accessToken = Yii::$app->security->generateRandomString(10);
        }
        return true;
    }
}
