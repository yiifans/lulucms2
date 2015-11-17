<?php

namespace source\modules\fragment\models;

use Yii;
use source\LuLu;
use yii\helpers\ArrayHelper;
use source\libs\Common;
/**
 * This is the model class for table "{{%fragment2_data}}".
 *
 * @property integer $id
 * @property integer $fragment_id
 * @property string $title
 * @property integer $created_at
 * @property string $created_by
 * @property integer $sort_num
 * @property integer $status
 */
class FragmentData extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fragment2_data}}';
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        Fragment::clearCachedData($this->fragment_id);
    }
}
