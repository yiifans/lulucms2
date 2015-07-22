<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use source\models\Content;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type='post';
$this->title = '模块管理';
$this->params['breadcrumbs'][] = $this->title;


$css=<<<CSS

table.da-table tr td.da-icon-column a{margin-right:5px;}
CSS;
$this->registerCss($css);

?>

<?php $this->toolbars([
    Html::a('新建模块', ['/gii/default/view','id'=>'lulumodule'], ['class' => 'btn btn-xs btn-primary mod-site-save','target'=>'_blank']),
]);?>

<table class="da-table">
    <thead>
        <tr>
            <th width="90px">标识</th>
            <th width="250px">名称</th>
            <th>描述</th>
            <th width="150px"></th>
        </tr>
    </thead>
    <tbody>

        <?php $index=-1;
              foreach ($modules as $module): 
                  $index+=1;
                  ?>

        <tr data-key="<?php echo $module['id']?>" class="<?if($index%2===0){echo 'odd';}else{echo 'even';}?>">
           
            <td><?php echo $module['id']?></td>
        <?php if($module['instance']===null):?>
            <td></td>
            <td>error</td>
            <td class="da-icon-column"></td>
        <?php else:?>
            <td><?php echo $module['instance']->name?></td>
            <td><?php echo $module['instance']->description?></td>
            <td class="da-icon-column">
                <?php 
                                if($module['instance']->is_system)
                                {
                                    echo '系统内置';
                                }
                                else if($module['can_install']){
                                    echo Html::a('安装',['install','id'=>$module['id']]);
                                }
                                else 
                                {
                                    if($module['has_admin'])
                                    {
                                        if($module['can_active_admin'])
                                        {
                                            echo Html::a('启用后台',['active','id'=>$module['id'],'is_admin'=>1]);
                                        }
                                        else
                                        {
                                            echo Html::a('关闭后台',['deactive','id'=>$module['id'],'is_admin'=>1]);
                                        }
                                    }
                                    if($module['has_home'])
                                    {
                                        if($module['can_active_home'])
                                        {
                                            echo Html::a('启用前台',['active','id'=>$module['id']]);
                                        }
                                        else
                                        {
                                            echo Html::a('关闭前台',['deactive','id'=>$module['id']]);
                                        }
                                    }
                                    
                                    if($module['can_uninstall'])
                                    {
                                        echo Html::a('卸载',['uninstall','id'=>$module['id']]);
                                    }
                                }
                                
                                
                             ?>
            </td>
        <?php endif;?>
        </tr>
        <?php endforeach;?>

    </tbody>
</table>
