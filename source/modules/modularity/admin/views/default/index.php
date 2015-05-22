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


?>


                <div class="mod">
                    <div class="mod-head">
                        <h3>
                            <span class="pull-left"><?= $this->title ?></span>
            
                             
                        </h3>
                    </div>
                    <div class="tab-content mod-content">
    <div id="w0" class="grid-view">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="120px">标识</th>
                    <th width="120px">名称</th>
                    <th>描述</th>
                    <th width="200px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            
                <?php foreach ($modules as $module): ?>
                    <?php if($module['instance']===null):?>
                    
                    <tr data-key="<?php echo $module['id']?>">
                        <td><?php echo $module['id']?></td>
                        <td></td>
                        <td>error</td>
                        <td></td>
                    </tr>
                    <?php else:?>
                    <tr data-key="<?php echo $module['id']?>">
                        <td><?php echo $module['id']?></td>
                        <td><?php echo $module['instance']->name?></td>
                        <td><?php echo $module['instance']->description?></td>
                        <td>
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
                                            echo '<span>|</span>';
                                            echo Html::a('启用前台',['active','id'=>$module['id']]);
                                        }
                                        else
                                        {
                                            echo '<span>|</span>';
                                            echo Html::a('关闭前台',['deactive','id'=>$module['id']]);
                                        }
                                    }
                                    
                                    if($module['can_uninstall'])
                                    {
                                        echo '<span>|</span>';
                                        echo Html::a('卸载',['uninstall','id'=>$module['id']]);
                                    }
                                }
                                
                                
                             ?>
                        </td>
                    </tr>                
                    <?php endif;?>
                
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
                    </div>
                    
                   
                </div>
