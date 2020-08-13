<?php

use Qcloud\Cos\Client;
use Qcloud\Cos\Exception\ServiceResponseException;

class ObjectACL
{
    private $cosClient;

    private $uploadId;
    private $eTag;
    private $versionId;

    // 设置对象 ACL
    protected function putObjectAcl() {
        $cosClient = $this->cosClient;
        //.cssg-snippet-body-start:[put-object-acl]
        try {
            $result = $cosClient->putObjectAcl(array(
                'Bucket' => 'examplebucket-1250000000', //格式：BucketName-APPID
                'Key' => 'exampleobject',
                'ACL' => 'private',
                'Grants' => array(
                    array(
                        'Grantee' => array(
                            'DisplayName' => 'qcs::cam::uin/100000000001:uin/100000000001',
                            'ID' => 'qcs::cam::uin/100000000001:uin/100000000001',
                            'Type' => 'CanonicalUser',
                        ),  
                        'Permission' => 'FULL_CONTROL',
                    ),  
                    // ... repeated
                ),  
                'Owner' => array(
                    'DisplayName' => 'qcs::cam::uin/100000000001:uin/100000000001',
                    'ID' => 'qcs::cam::uin/100000000001:uin/100000000001',
                )));
            // 请求成功
            print_r($result);
        } catch (\Exception $e) {
            // 请求失败
            echo "$e\n";
        }
        
        //.cssg-snippet-body-end
    }

    // 获取对象 ACL
    protected function getObjectAcl() {
        $cosClient = $this->cosClient;
        //.cssg-snippet-body-start:[get-object-acl]
        try {
            $result = $cosClient->getObjectAcl(array(
                'Bucket' => 'examplebucket-1250000000', //格式：BucketName-APPID
                'Key' => 'exampleobject',
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

    public function mObjectACL() {
        $this->init();

        // 设置对象 ACL
        $this->putObjectAcl();

        // 获取对象 ACL
        $this->getObjectAcl();

	    //.cssg-methods-pragma
    }
}
?>