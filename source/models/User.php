<?php

namespace source\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \source\core\base\BaseActiveRecord  implements \yii\web\IdentityInterface
{
	public $password;
	public $rememberMe;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at','password'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 8],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    public function scenarios()
    {
    	$parent = parent::scenarios();
    	$parent['login'] = ['username','password'];
    	$parent['register'] = ['username','password','email'];
    	return $parent;
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    
    public static function findIdentity($id)
    {
    	return User::findOne(['id'=>$id]);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	foreach (self::$users as $user) {
    		if ($user['accessToken'] === $token) {
    			return new static($user);
    		}
    	}
    
    	return null;
    }
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function getAuthKey()
    {
    	return $this->auth_key;
    }
  
    public function validateAuthKey($authKey)
    {
    	return $this->auth_key === $authKey;
    }
    
    public function validatePassword($password,$password_hash)
    {
    	return Yii::$app->security->validatePassword($password, $password_hash);
    }
    
   
    public function login()
    {
    	if(!$this->validate()){
    		return false;
    	}
    	
    	$user = User::findOne(['username' => $this->username]);
    	
    	if($user!==null){
    		if($this->validatePassword($this->password,$user->password_hash)){
    			\Yii::$app->user->login($user,50000);
    			return true;
    		}
    		
    		return false;
    	}else{
    		
    		return false;
    	}
    }
}
