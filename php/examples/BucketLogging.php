<?php

use Qcloud\Cos\Client;
use Qcloud\Cos\Exception\ServiceResponseException;

class BucketLogging
{
    private $cosClient;

    private $uploadId;
    private $eTag;
    private $versionId;

    // 开启存储桶日志服务
    protected function putBucketLogging() {
        $cosClient = $this->cosClient;
        //.cssg-snippet-body-start:[put-bucket-logging]
        try {
            $result = $cosClient->putBucketLogging(array(
                'Bucket' => 'examplebucket-1250000000', //格式：BucketName-APPID
                'LoggingEnabled' => array(
                    'TargetBucket' => 'examplebucket2-1250000000',
                    'TargetPrefix' => '', 
                )); 
            // 请求成功
            print_r($result);
        } catch (\Exception $e) {
            // 请求失败
            echo($e);
        }
        
        //.cssg-snippet-body-end
    }

    // 获取存储桶日志服务
    protected function getBucketLogging() {
        $cosClient = $this->cosClient;
        //.cssg-snippet-body-start:[get-bucket-logging]
        try {
            $result = $cosClient->getBucketLogging(array(
                'Bucket' => 'examplebucket-1250000000', //格式：BucketName-APPID
            )); 
            // 请求成功
            print_r($result);
        } catch (\Exception $e) {
            // 请求失败
            echo($e);
        }
        
        //.cssg-snippet-body-end
    }

	//.cssg-methods-pragma

    protected function init() {
        $secretId = "COS_SECRETID"; //"云 API 密钥 SecretId";
        $secretKey = "COS_SECRETKEY"; //"云 API 密钥 SecretKey";
        $region = "COS_REGION"; //设置一个默认的存储桶地域
        $this->cosClient = new Qcloud\Cos\Client(
            array(
                'region' => $region,
                'schema' => 'https', //协议头部，默认为http
                'credentials'=> array(
                    'secretId'  => $secretId ,
                    'secretKey' => $secretKey)));
    }

    public function mBucketLogging() {
        $this->init();

        // 开启存储桶日志服务
        $this->putBucketLogging();

        // 获取存储桶日志服务
        $this->getBucketLogging();

	    //.cssg-methods-pragma
    }
}
?>