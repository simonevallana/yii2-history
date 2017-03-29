<?php

namespace boolean\history;

use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application && $i18nModule = Yii::$app->getModule('history')) {
            $moduleId = $i18nModule->id;
            $app->getUrlManager()->addRules([
                'history/<id:\d+>' => $moduleId . '/default/view',
                'history/page/<page:\d+>' => $moduleId . '/default/index',
                'history' => $moduleId . '/default/index',
            ], false);
        }
    }
}
