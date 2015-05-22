<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "lulu_auth_permission".
 *
 * @property string $key
 * @property integer $category_id
 * @property string $name
 * @property integer $form
 * @property string $options
 * @property string $default_value
 * @property string $note
 */
class Permission extends BaseRbacActiveRecord
{
	const Form_Boolean=1;
	const Form_Input=2;
	const Form_RadioList=3;
	const Form_CheckboxList=4;
	
	public static function getForms($type=null)
	{
		$ret = [
			self::Form_Boolean=>'布尔值',
			self::Form_Input=>'输入框',
			self::Form_RadioList=>'单选',
			self::Form_CheckboxList=>'多选',
		];
		//return isset($ret[$type]);
		if($type!==null)
		{
			if(isset($ret[$type]))
			{
				return $ret[$type];
			}
			
			return 'unknown:'.$type;
		}
		return $ret;
	}
	public function getFormView()
	{
		if($this->form===self::Form_Boolean){
			return '_boolean';
		}else if($this->form===self::Form_Input){
			return '_input';
		}else if($this->form===self::Form_RadioList){
			return '_radiolist';
		}else if($this->form===self::Form_CheckboxList){
			return '_checkboxlist';
		}
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_auth_permission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'category_id', 'name', 'form'], 'required'],
            [['category_id', 'form'], 'integer'],
            [['options', 'default_value', 'note'], 'string'],
            [['key', 'name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => '标识',
            'category_id' => '所属分类',
            'name' => '名称',
            'form' => '表单类型',
            'options' => '选项',
            'default_value' => '默认值',
            'note' => '备注',
        ];
    }
}
