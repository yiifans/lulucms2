<?php

namespace source\modules\modularity\models;

use Yii;

/**
 * This is the model class for table "{{%modularity}}".
 *
 * @property string $id
 * @property integer $is_system
 * @property integer $is_content
 * @property integer $enable_admin
 * @property integer $enable_home
 */
class Modularity extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%modularity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['is_system', 'is_content', 'enable_admin', 'enable_home'], 'integer'],
            [['id'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_system' => 'Is System',
            'is_content' => 'Is Content',
            'enable_admin' => 'Enable Admin',
            'enable_home' => 'Enable Home',
        ];
    }
}
