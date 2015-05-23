<?php
use yii\web\View;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';



?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
           <div class="col-md-12">
           <div class="mod">
                <div class="mod-head">
                    <h3>
                        <span class="pull-left">系统信息</span>
                    </h3>
                </div>
                <div class="tab-content mod-content">
                    <table  class="table table-striped">
                        <tbody>
                        	<tr>
                                <td><?php echo '操作系统'; ?></td>
                                <td><?php echo php_uname('s'); ?> <?php echo php_uname('r'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo 'PHP 版本'; ?></td>
                                <td><?php echo PHP_VERSION; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo 'MySQL 版本'; ?></td>
                                <td><?php echo Yii::$app->db->pdo->getAttribute(PDO::ATTR_SERVER_VERSION); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           </div>
        </div>

    </div>
</div>
