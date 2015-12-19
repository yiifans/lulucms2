<?php

namespace source\modules\rbac\models;

use Yii;
use yii\helpers\ArrayHelper;
use source\libs\Constants;

/**
 * This is the model class for table "lulu_auth_permission".
 *
 * @property string $id
 * @property string $category
 * @property string $name
 * @property string $description
 * @property integer $form
 * @property string $default_value
 * @property string $rule
 * @property integer $sort_num
 */
class Permission extends BaseRbacActiveRecord
{
    const Category_Basic='basic';
    const Category_Controller='controller';
    const Category_System='system';
    public static function getCategoryItems($key=null)
    {
        $items = [
            //self::Category_Basic=>'基本权限',
            self::Category_Controller=>'控制器权限',
            self::Category_System=>'系统权限',
        ];
        return ArrayHelper::getItems($items,$key);
    }
    
	const Form_Boolean=1;
	const Form_Input=2;
	const Form_Textarea=3;
	const Form_RadioList=4;
	const Form_CheckboxList=5;
	public static function getFormItems($key=null)
	{
		$items = [
			self::Form_Boolean=>'布尔值',
			self::Form_Input=>'单行输入框',
		    self::Form_Textarea=>'多行输入框',
			self::Form_RadioList=>'单选',
			self::Form_CheckboxList=>'多选',
		];
		return ArrayHelper::getItems($items,$key);
	}
	public function getFormView()
	{
	    $items = [
	        self::Form_Boolean=>'_boolean',
	        self::Form_Input=>'_input',
	        self::Form_Textarea=>'_textarea',
	        self::Form_RadioList=>'_radiolist',
	        self::Form_CheckboxList=>'_checkboxlist',
	    ];
	    return ArrayHelper::getItems($items,$this->form);
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'name', 'form','sort_num', 'rule'], 'required'],
            [['form','sort_num'], 'integer'],
            [['default_value'], 'string'],
            [['description'], 'string', 'max'=>128],
            [['id', 'name', 'category','rule'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '标识',
            'category' => '所属分类',
            'name' => '名称',
            'description' => '备注',
            'form' => '表单类型',
            'default_value' => '默认值/选项',
            'sort_num' => '排序',
            'rule'=>'使用规则',
        ];
    }
    
    public function getDefaultValue()
    {
        if($this->form===self::Form_Boolean||$this->form===self::Form_Input||$this->form===self::Form_Textarea)
        {
            return $this->default_value;
        }
        
        $ret=[];
        $options = explode("\r\n", $this->default_value);
        foreach ($options as $option)
        {
            $item = explode("|", $option);
            if(count($item)===3)
            {
                $ret[]=$item[0];
                if($this->form===self::Form_RadioList)
                {
                    break;
                }
            }
        }
        return $ret;
    }
    
    public function getOptions()
    {
        if($this->form===self::Form_Boolean||$this->form===self::Form_Input||$this->form===self::Form_Textarea)
        {
            return [];
        }
        $ret=[];
    
        $options = explode("\r\n", $this->default_value);
        foreach ($options as $option)
        {
            $item = explode("|", $option);
            if(count($item)===1)
            {
                $ret[$item[0]]=$item[0];
            }
            else 
            {
                $ret[$item[0]]=$item[1];
            }
        }
        return $ret;
    }
    
    public static function getAllPermissionsGroupedByCategory()
    {
        $allPermissions=[];
        $allPermissions[Permission::Category_Basic]=[];
        $allPermissions[Permission::Category_Controller]=[];
        $allPermissions[Permission::Category_System]=[];
        
        $permissions = self::findAll([],'sort_num asc');
        foreach ($permissions as $permission)
        {
            $allPermissions[$permission->category][]=$permission;
        }
        return $allPermissions;
    }
    
    public function beforeSave($insert)
    {
        $this->default_value= trim($this->default_value);
        return parent::beforeSave($insert);
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if(!$insert)
        {
            if(isset($changedAttributes['id']))
            {
                Relation::updateAll(['permission'=>$this->id],['permission'=>$changedAttributes['id']]);
            }
        }
    }
}
