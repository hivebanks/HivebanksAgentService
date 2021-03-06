<?php


/*
========================== 发送手机验证码 ==========================


GET参数
    cellphone                 用户token
    country_code              国家代码


返回
  errcode = 0     发送成功

*/


namespace Aliyun\DySDKLite\Sms;
use Aliyun\DySDKLite\SignatureHelper;
require_once "SignatureHelper.php";
//require_once "sms_config.php";
class SMS{

    /**
     * 发送短信验证码
     */
    function send_sms($phone,$code) {

        $params = array ();

        // *** 需用户填写部分 ***

        $accessKeyId = 'LTAIuTfkvjnNg54j';
        $accessKeySecret = 'OTETap8a971xgfYdNCawWuHTkbR5dj';
        // phone
        $params["PhoneNumbers"] = $phone;

        // 短信签名
        $params["SignName"] = '风赢科技';

        // 短信模版 https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = 'SMS_142905027';

        // 短信验证码
        $params['TemplateParam'] = Array (
            "code" => $code,
            "product" => "123"
        );

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
            // fixme 选填: 启用https
            // ,true
        );

        return $content;
    }

    /**
     * 发送短信
     */
    function send_bot_status($phone) {

        $params = array ();

        // *** 需用户填写部分 ***

        $accessKeyId = 'LTAIuTfkvjnNg54j';
        $accessKeySecret = 'OTETap8a971xgfYdNCawWuHTkbR5dj';
        // phone
        $params["PhoneNumbers"] = $phone;

        // 短信签名
        $params["SignName"] = '风赢科技';

        // 短信模版 https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = 'SMS_148860363';

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        // fixme 选填: 启用https
        // ,true
        );

        return $content;
    }

    /**
     * 发送短信
     */
    function send_transfer_status($phone) {

        $params = array ();

        // *** 需用户填写部分 ***

        $accessKeyId = 'LTAIuTfkvjnNg54j';
        $accessKeySecret = 'OTETap8a971xgfYdNCawWuHTkbR5dj';
        // phone
        $params["PhoneNumbers"] = $phone;

        // 短信签名
        $params["SignName"] = '风赢科技';

        // 短信模版 https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = 'SMS_157452507';

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        // fixme 选填: 启用https
        // ,true
        );

        return $content;
    }
    /**
     * ca提现发送短信
     */
    function ca_withdraw_send($phone) {

        $params = array ();

        // *** 需用户填写部分 ***

        $accessKeyId = 'LTAIuTfkvjnNg54j';
        $accessKeySecret = 'OTETap8a971xgfYdNCawWuHTkbR5dj';
        // phone
        $params["PhoneNumbers"] = $phone;

        // 短信签名
        $params["SignName"] = '风赢科技';

        // 短信模版 https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = 'SMS_163720842';

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        // fixme 选填: 启用https
        // ,true
        );

        return $content;
    }
}


