<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "lulu_auth_assignment".
 *
 * @property string $user_id
 * @property string $role
 * @property integer $created_at
 * @property string $note
 */
class BaseRbacActiveRecord extends \source\core\base\BaseActiveRecord
{
	public function beforeValidate()
	{
		if(parent::beforeValidate())
		{
			if($this->hasAttribute('sort_num'))
			{
				if($this->sort_num == null || $this->sort_num == '')
				{
					$this->sort_num = 0;
				}
			}
			if($this->hasAttribute('created_at'))
			{
				if($this->created_at == null || $this->created_at == '')
				{
					$this->created_at = time();
				}
			}
			if($this->hasAttribute('updated_at'))
			{
				$this->updated_at =time();
			}
			return true;
		}
		return false;
	}
}
