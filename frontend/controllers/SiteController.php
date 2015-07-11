<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use source\models\LoginForm;
use source\models\ContactForm;
use source\models\Post;
use source\core\front\FrontController;
use source\models\User;
use source\models\Content;
use source\LuLu;
use yii\data\ActiveDataProvider;

class SiteController extends FrontController
{

    
    private function getMessage()
    {
        $mime_boundary = "----Meeting Booking----".MD5(TIME());
        
        $message = "Content-Type: text/html; charset=UTF-8\n";
        $message .= "Content-Transfer-Encoding: 8bit\n\n";
        $message .= "<html>\n";
        $message .= "<body>\n";
        
        $message .= "</body>\n";
        $message .= "</html>\n";
        $message .= "--$mime_boundary\r\n";
        
        //$message .= 'Content-Type:text/calendar; Content-Disposition: inline; charset=utf-8;\r\n';
        //$message .= "Content-Transfer-Encoding: 8bit\n\n";
        
$a =<<<M
BEGIN:VCALENDAR
PRODID:-//Microsoft Corporation//Outlook 15.0 MIMEDIR//EN
VERSION:2.0
METHOD:REQUEST
X-MS-OLK-FORCEINSPECTOROPEN:TRUE
BEGIN:VTIMEZONE
TZID:China Standard Time
BEGIN:STANDARD
DTSTART:16010101T000000
TZOFFSETFROM:+0800
TZOFFSETTO:+0800
END:STANDARD
END:VTIMEZONE
BEGIN:VEVENT
ATTENDEE;CN=cloudon10@163.com;RSVP=TRUE:mailto:cloudon10@163.com
CLASS:PUBLIC
CREATED:20150706T165425Z
DTEND;TZID="China Standard Time":20150707T083000
DTSTAMP:20150706T163450Z
DTSTART;TZID="China Standard Time":20150707T080000
LAST-MODIFIED:20150706T165425Z
LOCATION:d
ORGANIZER;CN="qq:1324756552":mailto:cloudon10@hotmail.com
PRIORITY:5
SEQUENCE:0
SUMMARY;LANGUAGE=zh-cn:ssssssssssssssssssssssssssss
TRANSP:OPAQUE
UID:040000008200E00074C5B7101A82E0080000000010F4F9BB4CB8D001000000000000000
	010000000F6B868A4C211DE43B45ADC5B6FDAF046
X-ALT-DESC;FMTTYPE=text/html:<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//E
	N">\n<HTML>\n<HEAD>\n<META NAME="Generator" CONTENT="MS Exchange Server ve
	rsion rmj.rmm.rup.rpr">\n<TITLE></TITLE>\n</HEAD>\n<BODY>\n<!-- Converted 
	from text/rtf format -->\n\n<P DIR=LTR ALIGN=JUSTIFY><SPAN LANG="en-us"></
	SPAN></P>\n\n</BODY>\n</HTML>
X-MICROSOFT-CDO-BUSYSTATUS:TENTATIVE
X-MICROSOFT-CDO-IMPORTANCE:1
X-MICROSOFT-CDO-INTENDEDSTATUS:BUSY
X-MICROSOFT-DISALLOW-COUNTER:FALSE
X-MS-OLK-AUTOFILLLOCATION:FALSE
X-MS-OLK-AUTOSTARTCHECK:FALSE
X-MS-OLK-CONFTYPE:0
BEGIN:VALARM
TRIGGER:-PT15M
ACTION:DISPLAY
DESCRIPTION:Reminder
END:VALARM
END:VEVENT
END:VCALENDAR
M;

$message .= $a;

return $message;

    }
    

    protected function createTransport()
    {
        $config = [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.sina.com',			//使用163邮箱
            'username' => 'xxx@sina.com',	//你的163的帐号
            'password' => "xxx",				//你的163的密码
            'port' => '25',
            //'port'=>'465',
            //'encryption' => 'ssl',
        ];
        
        if (!isset($config['class'])) {
            $config['class'] = 'Swift_MailTransport';
        }
        if (isset($config['plugins'])) {
            $plugins = $config['plugins'];
            unset($config['plugins']);
        }
        /* @var $transport \Swift_MailTransport */
        $transport = $this->createSwiftObject($config);
        if (isset($plugins)) {
            foreach ($plugins as $plugin) {
                if (is_array($plugin) && isset($plugin['class'])) {
                    $plugin = $this->createSwiftObject($plugin);
                }
                $transport->registerPlugin($plugin);
            }
        }
    
        return $transport;
    }
    
    protected function createSwiftObject(array $config)
    {
        if (isset($config['class'])) {
            $className = $config['class'];
            unset($config['class']);
        } else {
            throw new InvalidConfigException('Object configuration must be an array containing a "class" element.');
        }
        if (isset($config['constructArgs'])) {
            $args = [];
            foreach ($config['constructArgs'] as $arg) {
                if (is_array($arg) && isset($arg['class'])) {
                    $args[] = $this->createSwiftObject($arg);
                } else {
                    $args[] = $arg;
                }
            }
            unset($config['constructArgs']);
            $object = Yii::createObject($className, $args);
        } else {
            $object = Yii::createObject($className);
        }
        if (!empty($config)) {
            foreach ($config as $name => $value) {
                if (property_exists($object, $name)) {
                    $object->$name = $value;
                } else {
                    $setter = 'set' . $name;
                    if (method_exists($object, $setter) || method_exists($object, '__call')) {
                        $object->$setter($value);
                    } else {
                        throw new InvalidConfigException('Setting unknown property: ' . $className . '::' . $name);
                    }
                }
            }
        }
    
        return $object;
    }
    
    public function testMail2()
    {
//         $headers = "From: ".$from_name." <".$from_address.">\n";
//         $headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
//         $headers .= "MIME-Version: 1.0\n";
//         $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
//         $headers .= "Content-class: urn:content-classes:calendarmessage\n";
        
        $subject='1212';
        $sender='cloudon10@sina.com';
        $to = ['cloudon10@163.com','cloudon10@hotmail.com','yu.ye@139.com','oliver.ye@gmail.com'];
        
        $body=$this->getMessage();
        $contentType='text/calendar';
        
        $mailer = \Swift_Mailer::newInstance( $this->createTransport());
        $message = \Swift_Message::newInstance($subject,$body,$contentType,'utf-8');
        $message->setSender($sender);
        $message->setTo($to);
        
        $message->getHeaders()->addTextHeader('Content-Type','text/calendar; Content-Disposition: inline; charset=utf-8;');
        $message->getHeaders()->addTextHeader('Content-class','urn:content-classes:calendarmessage');
        //$message->getHeaders()->addTextHeader('Content-Type','text/calendar;method=REQUEST');
        
        $ret = $mailer->send($message);
        var_dump($ret);
    }
    
    public function actionIndex()
    {
        $query = Content::leftJoinWith('takonomy');
        $locals = LuLu::getPagedRows($query, [
            'orderBy' => 'created_at desc', 
            'pageSize' => 6
        ]);
        
        //$this->testMail2();
      
        return $this->render('index', $locals);
    }

    public function actionLogin()
    {
        if (! \Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        $model = new User();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail']))
        {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about', [
            'test' => 5, 
            'testData' => $this->testData
        ]);
    }

    public function actionClose()
    {
        return $this->render('close', [
            'message' => '站点维护中。。。'
        ]);
    }
}
