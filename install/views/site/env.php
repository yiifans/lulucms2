<?php

use yii\helpers\Url;

/* @var $this source\core\front\FrontView */
$this->title='检测运行环境';
?>

<div class="header">
    <div class="step_area"><h2>第一步：检测运行环境</h2></div>
</div>
<div class="mainbody">
    <div class="step_sgin"><span class="step step_1"></span></div>
    <h4 class="install_title">环境检查</h4>
    <table class="tb">
        <tr class="install_sub_title">
            <th width="25%" height="30">项目</th>
            <th width="30%">所需配置</th>
            <th width="30%">推荐配置</th>
            <th width="15%">当前服务器</th>
        </tr>
        <tr>
            <td height="24">操作系统</td>
            <td>不限制</td>
            <td>类Unix</td>
            <td><?php echo PHP_OS; ?></td>
        </tr>
        <tr>
            <td height="24">附件上传</td>
            <td>不限制</td>
            <td>2M</td>
            <td><?php echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传附件"?></td>
        </tr>
        <tr>
            <td height="24">GD 库</td>
            <td>1.0</td>
            <td>2.0</td>
            <td><?php
						$tmp = function_exists('gd_info') ? gd_info() : array();
						@$env_items[$key]['current'] = empty($tmp['GD Version']) ? 'noext' : $tmp['GD Version'];
						echo @$env_items[$key]['current'];
						unset($tmp);
						?></td>
        </tr>
        <tr>
            <td height="24">磁盘空间</td>
            <td>50M</td>
            <td>不限制</td>
            <td><?php
						if(function_exists('disk_free_space')) {
							@$env_items[$key]['current'] = floor(disk_free_space('../') / (1024*1024)).'M';
						}
						else{
							$env_items[$key]['current'] = 'unknow';
						}
						echo @$env_items[$key]['current'];
						?></td>
        </tr>
    </table>

    <h4 class="install_title">目录、文件权限检查</h4>
    <table class="tb">
        <tr class="install_sub_title">
            <th width="28%">目录文件</th>
            <th width="10%">检测结果</th>
            <th width="30%">依赖</th>
            <th>备注</th>
        </tr>
        <?php foreach((array)$isWritable as $val):?>
        <tr>
            <td><?php echo $val[0]; ?></td>
            <td class="<?php echo $val[2] ? 'passed' : ($val[1] ? 'failed' : 'warning'); ?>"><?php echo $val[2] ? '通过' : '未通过'; ?></td>
            <td style="color: #999;"><?php echo  $val[3]; ?></td>
            <td><?php echo $val[4];?></td>
        </tr>
        <?php endforeach ?>
    </table>

    <h4 class="install_title">依赖扩展</h4>
    <table class="tb">
        <tr class="install_sub_title">
            <th width="28%">项目名称</th>
            <th width="10%">检测结果</th>
            <th width="30%">组件依赖</th>
            <th>备注</th>
        </tr>
        <?php foreach($requirements as $requirement): ?>
        <tr>
            <td><?php echo $requirement[0]; ?></td>
            <td class="<?php echo $requirement[2] ? 'passed' : ($requirement[1] ? 'failed' : 'warning'); ?>"><?php echo $requirement[2] ? '通过' : '未通过'; ?></td>
            <td><?php echo $requirement[3]; ?></td>
            <td><?php echo $requirement[4]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="inst_btn_area">
        <?php if($requireResult >0 && $writeableResult >0): ?>
        <p class="env_success">恭喜！您的服务器配置完全符合LuLu CMS的安装要求。 </p>
        <?php elseif(($requireResult < 0 || $writeableResult <0) ): ?>
        <p class="tips">您的服务器配置符合LuLu CMS的最低要求。如果您需要使用特定的功能，请关注以上警告部分。 </p>
        <?php else: ?>
        <p class="tips error">您的服务器配置未能满足LuLu CMS的安装要求。 </p>
        <?php endif; ?>
        <form name="form" method="post" action="<?php echo Url::to(['db'])?>" >
            <button type="button" onclick="window.location='<?php echo Url::to(['index'])?>'" class="button">返回</button>
            <?php if($requireResult == 0 || $writeableResult == 0):?>
            <button type="button" class="button disable" disabled="disabled">环境检测未通过，请根据提示修正后再尝试安装</button>
            <?php else:?>
            <button type="button" onclick="window.location='<?php echo Url::to(['db'])?>'" class="button">下一步</button>
            <?php endif?>
            &nbsp;
        </form>
    </div>
</div>

