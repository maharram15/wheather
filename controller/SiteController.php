<?php

namespace backend\controllers;

use backend\models\Contacts;
use frontend\models\SignupForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/admin/login');
        }

        $ip = Yii::$app->geoip->ip($_SERVER['REMOTE_ADDR']);
        $json = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$ip->city}&appid=5fa93e696982f23976e87eb420c468c1"));

        $model = new Contacts();

        return $this->render('index', [
            'model' => $model,
            'ip' => $ip,
            'json' => $json
        ]);
    }
}
