using COSXML.Common;
using COSXML.CosException;
using COSXML.Model;
using COSXML.Model.Object;
using COSXML.Model.Tag;
using COSXML.Model.Bucket;
using COSXML.Model.Service;
using COSXML.Utils;
using COSXML.Auth;
using COSXML.Transfer;
using System;
using COSXML;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Reflection;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace COSSnippet
{
    public class BucketPolicyModel {

      private CosXml cosXml;

      BucketPolicyModel() {
        CosXmlConfig config = new CosXmlConfig.Builder()
          .SetRegion("COS_REGION") //设置一个默认的存储桶地域
          .Build();
        
        string secretId = "COS_SECRETID";   //云 API 密钥 SecretId
        string secretKey = "COS_SECRETKEY"; //云 API 密钥 SecretKey
        long durationSecond = 600;          //每次请求签名有效时长，单位为秒
        QCloudCredentialProvider qCloudCredentialProvider = new DefaultQCloudCredentialProvider(secretId, 
          secretKey, durationSecond);
        
        this.cosXml = new CosXmlServer(config, qCloudCredentialProvider);
      }

      /// 设置存储桶 Policy
      public void PutBucketPolicy()
      {
        //.cssg-snippet-body-start:[put-bucket-policy]
        
        //.cssg-snippet-body-end
      }

      /// 获取存储桶 Policy
      public void GetBucketPolicy()
      {
        //.cssg-snippet-body-start:[get-bucket-policy]
        
        //.cssg-snippet-body-end
      }

      /// 删除存储桶 Policy
      public void DeleteBucketPolicy()
      {
        //.cssg-snippet-body-start:[delete-bucket-policy]
        
        //.cssg-snippet-body-end
      }

      // .cssg-methods-pragma

      static void Main(string[] args)
      {
        BucketPolicyModel m = new BucketPolicyModel();

        /// 设置存储桶 Policy
        m.PutBucketPolicy();
        /// 获取存储桶 Policy
        m.GetBucketPolicy();
        /// 删除存储桶 Policy
        m.DeleteBucketPolicy();
        // .cssg-methods-pragma
      }
    }
}