<?php

namespace source\models;

use Yii;
use source\libs\Constants;

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
 * @property string $role
 */
class User extends \source\core\base\BaseActiveRecord  implements \yii\web\IdentityInterface
{
	public $password;
	
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
            [['username', 'auth_key', 'password_hash', 'email','role'], 'required'],
            [['username','email'],'unique'],
            [['password'], 'required','on'=>['login','create']],
            [['status', 'created_at', 'updated_at'], 'integer'],
            ['email','email'],
            [['username', 'password_hash', 'password_reset_token', 'email','auth_key'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
    	$parent = parent::scenarios();
    	$parent['login'] = ['username','password'];
    	$parent['create'] = ['username','password', 'email','status','role'];
    	$parent['update'] = ['username','password', 'email','status','updated_at','role'];
    	return $parent;
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'password'=>'密码',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => '状态',
            'statusText' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'role'=>'角色'
        ];
    }
    public function getStatusText()
    {
        return Constants::getStatusItems($this->status);
    }
    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }
    
    public static function findIdentity($id)
    {
    	return User::findOne(['id'=>$id]);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	return null;
    }
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function getAuthKey()
    {
    	return $this->id;
    }
  
    public function validateAuthKey($authKey)
    {
    	return $this->id === $authKey;
    }
    
    public function validatePassword($password,$password_hash)
    {
    	return Yii::$app->security->validatePassword($password, $password_hash);
    }
    
    public function generatePasswordHash($password=null)
    {
        if(empty($password))
        {
            $password=$this->password;
        }
        $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->getSecurity()->generateRandomKey() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
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
    	}
    	
    	return false;
    }
    public function beforeValidate()
    {
        
        return parent::beforeValidate();
    }
    
    public function beforeSave($insert)
    {
        if($this->isNewRecord)
        {
            $this->generateAuthKey();
            $this->generatePasswordHash();
            //$this->generatePasswordResetToken();
        }
        else
        {
            if(!empty($this->password))
            {
                $this->generatePasswordHash();
            }
        }
        return parent::beforeSave($insert);
    }
}
