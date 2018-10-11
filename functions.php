<?php
require("vendor/autoload.php");

define("SELF_URL", "https://pay.idc.ee");

$config = [
    'app_id' => 'idc',
    'notify_url' => SELF_URL.'/notify.php',
    'return_url' => SELF_URL.'/postpayment.php',
    'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA35sHnXePptrpwOwkRL/zH2HXTXXLAmZ7bW/8UEszg9Gc8GasxuJywIHRyTqKCqf1FkHXpbBKNn9jnfviYLI8QsfLrC5zm51WpBSu5tHutLquSb0EoeClCJgj/qyVVwPV0NySlBkJiwWlcfvh67o80smCQ8iwz7srABRqIxsLD0zsEBoGh48goQYLW08Iw5RTdYutv9YAuJWuarJaeZRh92HlVIc2hzve7UQMTHcVI3UR2M10OrU32akWUoKVk7rPlfTOxhAG4YnQk4t/PtMLS9zGWkJyQOWmAC9bUVdGu/UjcZ9/jn2yiN+LshUis5NJkSuu9ybcd9oNQwgEzj6OvwIDAQAB',
    // 加密方式： **RSA2**
    'private_key' => 'MIIEpAIBAAKCAQEAyAlWCnQ7PuAv9JNBWHWzv+O2OAPqtSle3pbMJNY1ql2/GHN5vkMS0oVqxh3gmfqAKYl5X3y1QnC7rJrhIONtuYiqtTOCdefdBIh2OGrVFOB9B+EkAyhiRab6fmsUMnplOBDS6nZduqeFfa3r2BM8s5OaC0gUcxZkQbfWKRnvvKTsXOZtzgfqz8DmXXc1jdkN4VlnrYV90MLKvfaWPE2T14/Xcil0TiRboO1IP9/5yya1bq0lYfihAvld0p/M4lp+xaRcdBaLYEiHyXoBKOrqcwBzLn7ie5J6Yi2bMOnK0f9XnyJUc0bdKEgoieCHtIn8CzasKyJyN6zfMnQIPfZJTQIDAQABAoIBAQCAqMCWaLvSbQ9rF2toIgxC14tT6/ECJGHIeOVErCJIOZO3fk5HeYyZqwZJ9t2HK/9SuAFA0U0kNq3/Dn7OUHk6ZBSoB0FZ5I/bYonnL49tphXFA6HOBiNu+T8UIHsVHHQN44RFGWyfqS/K7hpLF9RrC/yAVRQSEczaGAu+09fGVIj1XueCbXqeoaqPbkrM3//zJ/mb/DnJ3DygbPBu7E4FPCLdTjAnGdONYredfcdWzLhHf3P2WiySnl18+o5ETFOkzD0X6xrFtpLKPboMvIFLC/CF7YEsbffsGZoNCk0/GRWOOpknwM7cdxNnxQP52F34XhBH/EcF4ASxDAdj1DMBAoGBAPheRwkjBdk3zctaUwmwmjCwm5ilbs5yOwyK3XnCTJI2Pn/yk5zDX8RdevOsn+2hGZCLXucImmIqEjwd7RvczL1TEThdU/UE5gKyOTo/3P7WOYyC9bYNnCIEDh9CQhBgyncbIoqR1bOVjzXWlMAPA1T1mvkxDK/PRGmDDjkKbdzZAoGBAM4u3pL2YiQtU2VXoJYzLWRvUhzwiZrHx5gg3mn/Gdo3rbQLzF73yHYuXuoGUV0IQmZnp90kRl85nrBucTnxtwFtt4U8XVFPqtyKco05R1xulqInAUilc+nrQZpOiaO+d/I0gu0XXFPPnQMIRT8gbCA0fARe0ydnu9FcT6bHT1eVAoGAIJ5JGAMYfomcpmtLYodmCKT5GlgHsGdCKAiIw7fn1H/5P1Z9WmYySpi4UA5Ixq2UrO4Q3ai8lc3OrUSE4lbiMK8bINro7tHg31PGvkaq4HEEB9cfK/Snn7QGosZR5NLBZFkU9Tvn4/jtYPW4fWy7VEoZO0bc0q4W3wCOOqGLAikCgYAsx+07ihvCs717M08DkFX5jFwPQQcCAQYOuoTUDL32sUUe57kZn0OAt42R0pF1XUfeqgDBfRFzuTYIJ9Sbuy3+N3A2lefGs0Du6Xr7xUcEglhhG4uh1Z2ZXqk+9HPcho/SoSkWiY5Z/auibvdrQIV7cSrGYDoIQvV+AUijdoJ7CQKBgQDRjTgGbscWjXebvEW5LqOvFS7ztTQYDvXyJ0JJHghsHQvyDvW1V6xmMCgrV3ZvwINsU9Lqd2cn/bP7sJrZ9N004npgvd/KIUSQv494JKRqccEqH+LSKEj9jOxD9UvrNUD+xzwPIc66/mjSJsFJH7z21VadT76+PNsV/iQNqUs8tQ==',
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
$redirectUrl = "https://xiongshi.china.myorderbox.com/servlet/CustomPaymentAuthCompletedServlet";  // redirectUrl received from foundation
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
