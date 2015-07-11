<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\core\widgets\ActiveForm;
use source\LuLu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '设定权限:'.$role['name'].'('.$role['id'].')' ;
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['role/index']];
$this->params['breadcrumbs'][] = $this->title;

?>


                                
    <?php $form=ActiveForm::begin();?>
    
    <div class="da-ex-tabs">
        <ul>
            <?php foreach($categories as $cateId=>$cateName):?>
            <li><a href="#tabs-<?php echo $cateId?>"><?php echo $cateName?></a></li>
            <?php endforeach;?>
        </ul>
        
        <?php foreach($categories as $cateId=>$cateName):?>
        <div id="tabs-<?php echo $cateId?>">
        
            <?php foreach ($allPermissions[$cateId] as $permission):?>
            <?php $v = isset($rolePermissions[$permission['id']]) ? $rolePermissions[$permission['id']]['value'] : $permission->getDefaultValue();?>
                <div class="da-form-row">
                    <label for="permission-<?php echo $permission['id']?>"><?php echo $permission['name']?></label>
                    <div class="da-form-item small">
                        <?php echo $this->render('form/'. $permission['formView'], ['permission'=>$permission,'value'=>$v]);?>
                    </div>
                    <div class="help-block"></div>
                </div>
            <?php endforeach;?>
        
        </div>
        <?php endforeach;?>
       
    </div>
                                        
    


	

<?= $form->defaultButtons() ?>

    <?php ActiveForm::end();?>