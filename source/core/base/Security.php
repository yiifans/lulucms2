<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace source\core\base;

use yii\helpers\StringHelper;
use Yii;
use yii\base\InvalidParamException;

/**
 * Security provides a set of methods to handle common security-related tasks.
 *
 * In particular, Security supports the following features:
 *
 * - Encryption/decryption: [[encryptByKey()]], [[decryptByKey()]], [[encryptByPassword()]] and [[decryptByPassword()]]
 * - Key derivation using standard algorithms: [[pbkdf2()]] and [[hkdf()]]
 * - Data tampering prevention: [[hashData()]] and [[validateData()]]
 * - Password validation: [[generatePasswordHash()]] and [[validatePassword()]]
 *
 * > Note: this class requires 'mcrypt' PHP extension. For the highest security level PHP version >= 5.5.0 is recommended.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Tom Worster <fsb@thefsb.org>
 * @author Klimov Paul <klimov.paul@gmail.com>
 * @since 2.0
 */
class Security extends \yii\base\Security
{
}
