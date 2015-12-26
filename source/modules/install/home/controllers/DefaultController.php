<?php
namespace source\modules\install\home\controllers;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;
use yii\helpers\FileHelper;
use source\libs\Utility;
use yii\db\Connection;
use yii\base\Exception;
use yii\db\yii\db;
use yii\web\View;
use yii\web\Response;

class DefaultController extends \source\core\front\FrontController
{
    public function beforeAction($action)
    {
        return true;
        
        if($action->id==='stop')
        {
            return parent::beforeAction($action);
        }
        
        $file = LuLu::getAlias('@data/install.lock');
        if (file_exists($file))
        {
            return $this->redirect([
                'stop'
            ]);
        }
        return parent::beforeAction($action);
    }
    
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    public function actionRmfile()
    {
        @unlink(__FILE__);
    }

    public function actionEnv()
    {
        $isWritable = [
            [
                '私有临时文件(data/runtime)', 
                true, 
                FileHelper::canWrite(LuLu::getAlias('@data/runtime')), 
                '系统核心', 
                '必须可读写'
            ], 
            [
                '附件上传目录(data/attachment)', 
                false, 
                FileHelper::canWrite(LuLu::getAlias('@data/attachment')), 
                '附件上传', 
                '若无附件上传可不用写权限'
            ], 
            [
                '数据目录(data/backup)', 
                false, 
                FileHelper::canWrite(LuLu::getAlias('@data/backup')), 
                '数据库备份', 
                '若不备份数据库可不用写权限'
            ], 
            [
                '配置文件目录(protected/config)', 
                false, 
                FileHelper::canWrite(LuLu::getAlias('@data/attachment')), 
                '安装程序', 
                '若手动安装系统写可不用写权限'
            ], 
            [
                '公共资源文件(statics/assets)', 
                true, 
                FileHelper::canWrite(LuLu::getAlias('@statics/assets')), 
                '系统核心', 
                '必须可读写'
            ]
        ];
        
        $requirements = array(
            [
                'PHP版本', 
                true, 
                version_compare(PHP_VERSION, "5.4.0", ">="), 
                '系统核心', 
                'PHP 5.4.0 或更高版本是必须的.'
            ], 
            [
                '$_SERVER 服务器变量', 
                true, 
                'ok' === $message = Utility::checkServerVar(), 
                '系统核心', 
                $message
            ], 
            [
                
                'Reflection 扩展模块', 
                true, 
                class_exists('Reflection', false), 
                '系统核心', 
                ''
            ], 
            [
                'PCRE 扩展模块', 
                true, 
                extension_loaded("pcre"), 
                '系统核心', 
                ''
            ], 
            [
                'SPL 扩展模块', 
                true, 
                extension_loaded("SPL"), 
                '系统核心', 
                ''
            ], 
            [
                'DOM 扩展模块', 
                false, 
                class_exists("DOMDocument", false), 
                'CHtmlPurifier, CWsdlGenerator', 
                ''
            ], 
            [
                'PDO 扩展模块', 
                true, 
                extension_loaded('pdo'), 
                '所有和使用PDO数据库连接相关的类', 
                ''
            ], 
            [
                'PDO MySQL 扩展模块', 
                true, 
                extension_loaded('pdo_mysql'), 
                'MYSQL数据库', 
                '使用MYSQL必须支持'
            ], 
            [
                'Mcrypt 扩展模块', 
                false, 
                extension_loaded("mcrypt"), 
                'CSecurityManager', 
                '加密和解密方法'
            ], 
            [
                'SOAP 扩展模块', 
                false, 
                extension_loaded("soap"), 
                'CWebService, CWebServiceAction', 
                ''
            ], 
            [
                'GD 扩展模块', 
                false, 
                'ok' === $message = Utility::checkCaptchaSupport(), 
                'CCaptchaAction', 
                $message
            ], 
            [
                'Ctype 扩展模块', 
                false, 
                extension_loaded("ctype"), 
                'CDateFormatter, CDateFormatter, CTextHighlighter, CHtmlPurifier', 
                ''
            ]
        );
        
        $requireResult = 1;
        foreach ($requirements as $i => $requirement)
        {
            if ($requirement[1] && ! $requirement[2])
                $requireResult = 0;
            else if ($requireResult > 0 && ! $requirement[1] && ! $requirement[2])
                $requireResult = - 1;
            if ($requirement[4] === '')
                $requirements[$i][4] = '&nbsp;';
        }
        $writeableResult = 1;
        foreach ($isWritable as $k => $val)
        {
            if ($val[1] && ! $val[2])
                $writeableResult = 0;
            else if ($requireResult > 0 && ! $val[1] && ! $val[2])
                $writeableResult = - 1;
            if ($val[4] === '')
                $isWritable[$i][4] = '&nbsp;';
        }
        $data = array(
            'isWritable' => $isWritable, 
            'writeableResult' => $writeableResult, 
            'requireResult' => $requireResult, 
            'requirements' => $requirements
        );
        
        return $this->render('env', $data);
    }

    public function actionDb()
    {
        return $this->render('db', []);
    }

    public function actionProgress()
    {
        return $this->render('progress', []);
    }

    public function actionComplete()
    {
        return $this->render('complete', []);
    }
    
    public function actionStop()
    {
        return $this->render('stop');
    }
    
   
    public function afterResponse($event)
    {
        if(LuLu::getApp()->requestedAction->id==='progress')
        {
            $this->installing();
        }
    }
    
    public function installing()
    {
        $dbHost = LuLu::getPostValue('dbHost');
        $dbName = LuLu::getPostValue('dbName');
        $dbUsername = LuLu::getPostValue('dbUsername');
        $dbPassword = LuLu::getPostValue('dbPassword');
        $tbPre = LuLu::getPostValue('tbPre');
        
        try 
        {
            self::_appendLog('保存配置文件。。。');
            $this->writeConfig();
            self::_appendLog('配置文件保存成功');
        }
        catch (\Exception $e)
        {
            self::_appendLog('配置文件保存出错',true);
            return;
        }
       
        try
        {
            self::_appendLog('设置数据库信息。。。');
            $db = LuLu::getDB();
        
            $db->createCommand("USE {$dbName}")->execute();
            $db->createCommand("SET NAMES 'utf8',character_set_client=binary,sql_mode=''")->execute();
            self::_appendLog('数据库信息设置成功');
        }
        catch (\Exception $e)
        {
            $message = self::getDbError($e->getMessage(), array(
                'dbHost' => $dbHost,
                'dbName' => $dbName
            ));
            self::_appendLog($message, true);
            return;
        }
        
        try
        {
            $transaction = $db->beginTransaction();
            self::_appendLog('创建数据库表。。。');
            if($this->executeSql($db, 'install')!==true)
            {
                $transaction->rollBack();
                return;
            }
            self::_appendLog('数据库表创建成功');
        
            self::_appendLog('生成管理员。。。');
            $this->insertAdmin($db);
            self::_appendLog('管理员生成成功');
        
            if (LuLu::getPostValue('testData') === 'Y')
            {
                self::_appendLog('导入测试数据。。。');
                if($this->executeSql($db, 'test_data')!==true)
                {
                    $transaction->rollBack();
                    return;
                }
                self::_appendLog('测试数据导入成功');
            }
        
            $transaction->commit();
        
            $file = LuLu::getAlias('@data/install.lock');
            @touch($file);
        
            self::_appendLog('安装完成');
            //echo '<script>window.location="' . Url::to(['complete']) . '"</script>';
        }
        catch (\Exception $e)
        {
            $transaction->rollBack();
            $message = self::getDbError($e->getMessage(), array(
                'dbHost' => $dbHost,
                'dbName' => $dbName
            ));
            self::_appendLog($message, true);
        }
    }
    
    

    private function writeConfig()
    {
        $dbHost = LuLu::getPostValue('dbHost');
        $dbName = LuLu::getPostValue('dbName');
        $dbUsername = LuLu::getPostValue('dbUsername');
        $dbPassword = LuLu::getPostValue('dbPassword');
        $tbPre = LuLu::getPostValue('tbPre');
    
        $dbConfig = [
            'class' => 'yii\db\Connection', 
            'dsn' => "mysql:host={$dbHost};dbname={$dbName}", 
            'username' => $dbUsername, 
            'password' => $dbPassword, 
            'charset' => 'utf8', 
            'tablePrefix' => $tbPre, 
            'enableSchemaCache' => true, 
            'schemaCache' => 'schemaCache'
        ];
        
        $str = var_export($dbConfig, TRUE);
        $str = '<?php return ' . $str . ' ;?>';
        
        file_put_contents(LuLu::getAlias('@data/config/db2.php'), $str);
    }
    
  
    private function insertAdmin($db)
    {
        $username = LuLu::getPostValue('username');
        $password = LuLu::getPostValue('password');
        $email = LuLu::getPostValue('email');
        
        $tbPre = $db->tablePrefix;
        //$db->createCommand("INSERT INTO `" . $tbPre . "user`(`username`, `password`,`group_id`, `email`,`create_time`) VALUES('" . $username . "','" . md5($password) . "','1','" . $email . "', " . time() . ");")->execute();
    }
    
    private function executeSql($db,$file)
    {
        $file=LuLu::getAlias('@data/sql').'/'.$file.'.sql';
        
        if(!FileHelper::exist($file))
        {
            self::_appendLog('SQL文件：'.$file.'不存在',true);
            return false;
        }
        
        $tbPre = $db->tablePrefix;
        $testData = @file_get_contents($file);
        $testDataSqls = self::_splitsql($testData);
        
        if (is_array($testDataSqls))
        {
            foreach ($testDataSqls as $sql)
            {
                if (trim($sql) != '')
                {
                    $command = $db->createCommand(str_replace('#@__', $tbPre, $sql))->execute();
                }
            }
        }
        else
        {
            $command = $db->createCommand(str_replace('#@__', $tbPre, $sql))->execute();
        }
        return true;
    }
    
   
    private function _appendLog($message, $callBack = false)
    {
        if ($callBack)
        {
            $message .= "<br> <a href='" . Url::to(['db']) . "' class='red'>返回检查</a>";
        }
        
        echo '<script>var message = '.json_encode($message).'; $("#progress").append(message+"<br />");</script>';
        ob_flush();
        flush();
    }
    
    private function getDbError($message, $params = array())
    {
        if (preg_match('/Unknown database|1049/', $message))
        {
            $message = '未找到数据库: ' . $params['dbName'] . ' 请先创建该库';
        }
        elseif (preg_match('/failed to open the DB/', $message))
        {
            $message = '连接失败，请检查数据库配置';
        }
        elseif (preg_match('/1044/', $message))
        {
            $message = '当前用户没有访问数据库的权限';
        }
        else
        {
            //$ret = false;
        }
        return $message;
    }

    public function actionDbCheck()
    {
        $dbHost = LuLu::getPostValue('dbHost');
        $dbName = LuLu::getPostValue('dbName');
        $dbUsername = LuLu::getPostValue('dbUsername');
        $dbPassword = LuLu::getPostValue('dbPassword');
        
        if (empty($dbHost) || empty($dbName) || empty($dbUsername) || empty($dbPassword))
        {
            throw new Exception('数据库信息必须填写完整');
        }
        
        $config = [
            'dsn' => "mysql:host={$dbHost};dbname={$dbName}", 
            'username' => $dbUsername, 
            'password' => $dbPassword
        ];
        
        $db = new Connection($config);
        
        try
        {
            $db->open();
            if ($db->isActive)
            {
                $var['state'] = 'success';
                $var['message'] = '连接成功';
            }
            else
            {
            }
        }
        catch (Exception $e)
        {
            $var['state'] = 'error';
            $info=['dbHost' => $dbHost,
                        'dbName' => $dbName];
            $error = self::_dbError($e->getMessage(), $info);
                    
            if ($error == false)
            {
                $var['message'] = '无法连接，请检查数据库配置信息是否正确';
            }
            else
            {
                $var['message'] = $error;
            }
       }
    }


    protected function _splitsql($sql)
    {
        $sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "ENGINE=\\1 DEFAULT CHARSET=UTF8", $sql);
        $sql = str_replace("\r", "\n", $sql);
        $ret = array();
        $num = 0;
        $queriesarray = explode(";\n", trim($sql));
        unset($sql);
        foreach ($queriesarray as $query)
        {
            $ret[$num] = '';
            $queries = explode("\n", trim($query));
            $queries = array_filter($queries);
            foreach ($queries as $query)
            {
                $str1 = substr($query, 0, 1);
                if ($str1 != '#' && $str1 != '-')
                    $ret[$num] .= $query;
                // $ret[$num] .= XUtils::autoCharset($query,'gbk','utf-8');
            }
            $num ++;
        }
        return ($ret);
    }
}
