<?php
require("vendor/autoload.php");

$config = [
    'app_id' => 'idc',
    'notify_url' => 'http://127.0.0.1:8180/notify.php',
    'return_url' => 'http://127.0.0.1:8180/postpayment.php',
    'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwukSQbn+r4OLMVQideUIR9QQN22JOVM2lo2lBUDttoWe3ER4beDWqqttV3UA94q0ZzjNd/qk4/aj0yPb6sho+kEbQa/j9g4Or+PKZZl6GwBoRQHlbsChs2gJNvVdwH+hGUbwFHvl+NUnSMgjosLSqD38NCnU+TsGUkO77HjwUn7YSKBRGQ8oPoIrqTWfjyHFEptG88ZUAXMs1mcDTI/HYxXIW4ucfMQxU61MDHMAKY99g+7boY2Kce5qJ1v9yF9/fDkxrqegjM18DZ82EuSRBD3UkYkjonu/f7SJv11Xf+5zxQFcAmemLaN98HtqkqxKPL2rRnavKIYQyIESctqFrQIDAQAB',
    // 加密方式： **RSA2**
    'private_key' => 'MIIEogIBAAKCAQEAwukSQbn+r4OLMVQideUIR9QQN22JOVM2lo2lBUDttoWe3ER4beDWqqttV3UA94q0ZzjNd/qk4/aj0yPb6sho+kEbQa/j9g4Or+PKZZl6GwBoRQHlbsChs2gJNvVdwH+hGUbwFHvl+NUnSMgjosLSqD38NCnU+TsGUkO77HjwUn7YSKBRGQ8oPoIrqTWfjyHFEptG88ZUAXMs1mcDTI/HYxXIW4ucfMQxU61MDHMAKY99g+7boY2Kce5qJ1v9yF9/fDkxrqegjM18DZ82EuSRBD3UkYkjonu/f7SJv11Xf+5zxQFcAmemLaN98HtqkqxKPL2rRnavKIYQyIESctqFrQIDAQABAoIBABr+FB0uGOtNmFU4hZ02HrNz1tsWPE7IC2NGMnhLyZ/hWWK/yL3OyWvRWc8m0P93Igy5fRsEhxla6s0uxiH5pzAhHBk4tqU4xSfur/TqEFL093u3C4MPAlXKLpyB1n32LuVFQbJUhkCzpEEcFnNP78SE8Qx4TppFZla2MqxJA18pG+ABIJJvRoLBbXU1HoKNP0NeVUIoeqQ5AEZ+OZWBhD1tbVQg867zNr20G2cNPPCT5IZj6Z4TqSP+3qajroke5bK40RXuFaap9bd7MbQ3hsjVDMorCzoS6X5TXiJaviqeGvdDrmW4uRHagKTen1LgrDJTTb7V8MIUtIbfsWmwjIECgYEA7vWs17oqzQpAzsOQK0NZbQDAfVA4fPmI3EzG/GBquuVzmmJCWx+sPTzFGVKWTFlR8cJhrdrMZ1W7LOQrY1/AZTpWbvQlQs1JU42u3lRQknx9AWSUFab3kMbGV+Y8fCecNHZq+7wgILo80Qlbvyk71QxFLDHPyRTNUqPOcvS6vGUCgYEA0M9BiGOFq12ND/0nb8rUlzwBlO+Mk4qwiL0dmWB+IZ5rJ/M9+mZDdMwGEMoXQkKfG8TshAgLSQdwp4BGdURAXOQricmJ0xCl/ra/ATlo7Fr3Yu/Pjq8vsFLMrDb5WnXfr2qbLkDjesXGgZiBXt/K+DUcUPzaz0ko0TkAA03Hm6kCgYBhGuTKJZUPDYOYglArxIqqiQuv4NGTt7OuEmUqWeQFXwjDS/q7HPvZRsCxsaXyELoEDIG1LJyzwVr2uyIGl/qPKE3HeN9LbjDGC2VsY8b6QCxsTHsA8YDZDG29eopJya7ogtamxaQoqIXeTHdED3WI9huGAhf2FsX5NyfF/z2DIQKBgAnw0/3aPxLZcU3Bj48S6OwKP0kH3nlnsN/RoQccQOT41cEhI2I4XB3DWMaT2GefJFP+HARtHZxsbkCLKs+KYEYL1sbIgXc646wspws34HbgHcboA8mXLX4Hcxb/xv83fV6shJa/IBVINRsWV5JctRz76k0wvHoB0Z+kRwvhOA+BAoGAMK80wmPk6GDbohjCxtRaoOHm0A/ZA3hFAGjzD4MuEn1RztZWdzwdWDJeUTPWoS3nwXn08GI8aSlaZW3IR5vMefjT8gu7LkHZ2WXX+qME94artmJUEJCjrGmOhO9EXqkOLtRDMTkEf9GYQVQkr6vhRekUvl473HvbIspMjmlRY3s=',
    'log' => [ // optional
        'file' => 'alipay.log',
        'level' => 'debug', // 建议生产环境等级调整为 info，开发环境为 debug
        'type' => 'daily', // optional, 可选 daily.
        'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
    ],
    'http' => [ // optional
        'timeout' => 5.0,
        'connect_timeout' => 5.0,
        // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
    ],
    'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
];
$key = "O1QXZIoCzlddEj330QSF9VJVUbQemhYm"; //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel
$redirectUrl = "https://zhanshen.china.myorderbox.com/servlet/CustomPaymentAuthCompletedServlet";  // redirectUrl received from foundation
$logger = Yansongda\Pay\Log::createLogger(
    $config['log']['file'],
    'alipay.log',
    $config['log']['level'],
    $config['log']['type'],
    $config['log']['max_file']
);
Yansongda\Pay\Log::setLogger($logger);

function generateChecksum($transId, $sellingCurrencyAmount, $accountingCurrencyAmount, $status, $rkey, $key)
{
    $str = "$transId|$sellingCurrencyAmount|$accountingCurrencyAmount|$status|$rkey|$key";
    $generatedCheckSum = md5($str);
    return $generatedCheckSum;
}

function verifyChecksum($paymentTypeId, $transId, $userId, $userType, $transactionType, $invoiceIds, $debitNoteIds, $description, $sellingCurrencyAmount, $accountingCurrencyAmount, $key, $checksum)
{
    $str = "$paymentTypeId|$transId|$userId|$userType|$transactionType|$invoiceIds|$debitNoteIds|$description|$sellingCurrencyAmount|$accountingCurrencyAmount|$key";
    $generatedCheckSum = md5($str);
    if ($generatedCheckSum == $checksum) {
        return true ;
    } else {
        return false ;
    }
}
