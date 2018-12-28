<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 * @package app\models
 * @property $id_department int
 */

class User extends ActiveRecord implements IdentityInterface
{
    private $auth_key;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function rules()
    {
        return [
            [
                ['username','password', 'id_department'], 'required'
            ],
            [
                ['username', 'password'], 'string',
            ],
            [
                ['username'], 'unique'
            ],
            [
                ['id_department'], 'integer'
            ],
//            [
//                ['id_department'], 'exist', 'targetClass' => '\app\models\Department', 'targetAttribute' => 'id', 'message' => Yii::t('app', 'this department not exist')
//            ]
        ];
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = static::findOne(['username' => $username]);
        return $user ? $user : '';
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getDepartment()
    {
        $department = Department::findOne($this->id_department);
        if ($department){
            return $department->name;
        }
        return "";

    }

}