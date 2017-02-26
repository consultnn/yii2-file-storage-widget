<?php

namespace consultnn\yii2\filestorage\widget\actions;

use consultnn\filestorage\client\Client;
use Yii;
use yii\base\Action;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Class UploadAction
 * @package common\components
 */
class UploadAction extends Action
{
    /**
     * @var Client
     */
    private $client;

    public $previewParams = [
        'w' => 200,
    ];

    /**
     * UploadAction constructor.
     * @param string $id
     * @param Controller $controller
     * @param Client $client
     * @param array $config
     */
    public function __construct($id, Controller $controller, Client $client, array $config = [])
    {
        parent::__construct($id, $controller, $config);

        $this->client = $client;
    }

    /**
     * @return string
     * @throws \yii\base\InvalidParamException
     */
    public function run()
    {
        $result = $this->client->upload(current($_FILES)['tmp_name']);

        $fileHash = current($result);

        return Json::encode([
            'filename' => $fileHash,
            'filelink' => $fileHash,
            'preview' => $this->client->makeUrl($fileHash, $this->previewParams),
        ]);
    }
}
