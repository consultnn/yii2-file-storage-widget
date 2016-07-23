<?php

namespace consultnn\yii2\filestorage\widget;

use yii\web\AssetBundle;

class FileUploadAsset extends AssetBundle
{
    public function init()
    {
        parent::init();

        $this->sourcePath = '@vendor/consultnn/yii2-file-storage-widget/src/assets';
        $this->css = ['file-upload.css'];
        $this->js = ['file-upload.js'];
        $this->depends = [LightBoxAsset::class];
    }
}
