<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\User;
use yii\console\ExitCode;
use yii\helpers\Console;
/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppController extends Controller
{
    public function actionAddUser(string $username, string $password)
    {
        $user = new User();
        $user->username = $username;
        $user->password_hash = \Yii::$app->security->generatePasswordHash($password);
        $user->access_token = \Yii::$app->security->generateRandomString(255);
        if (!$user->save()) {
            var_dump($user->errors);
            Console::output('not saved');
        } else {
            Console::output('saved');
        }
    }
}