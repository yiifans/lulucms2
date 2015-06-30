<?php
use yii\web\View;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';


$this->title='系统信息';
?>
<table  class="da-table">
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
                            <tr>
                                <td><?php echo 'Yii交流社区'; ?></td>
                                <td><a href="http://www.yiifans.com" target="_blank"> Yii交流社区</a></td>
                            </tr>                            
                        </tbody>
                    </table>