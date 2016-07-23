<?php

namespace consultnn\yii2\filestorage\widget\actions;

use Yii;
use yii\base\Action;
use yii\helpers\Json;

/**
 * Class UploadAction
 * @package common\components
 */
class UploadAction extends Action
{
    /**
     * @return string
     */
    public function run()
    {
        $result = Yii::$app->fileStorage->upload(current($_FILES)['tmp_name']);
        $fileHash = current($result);

        return Json::encode([
            'filename' => $fileHash,
            'filelink' => $fileHash,
            'preview' => Yii::$app->fileStorage->get($fileHash, ['w' => 200]),
        ]);
    }
}
