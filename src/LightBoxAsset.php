<?php

namespace consultnn\yii2\filestorage\widget;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class LightBoxAsset extends AssetBundle
{
    public function init()
    {
        parent::init();

        $this->sourcePath = '@vendor/bower/lightbox2/dist';
        $this->css = ['css/lightbox.css'];
        $this->js = ['js/lightbox.js'];
        $this->depends = [JqueryAsset::class];
    }
}
