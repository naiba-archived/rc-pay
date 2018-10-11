<?php
require("vendor/autoload.php");

define("SELF_URL","https://pay.idc.ee");

$config = [
    'app_id' => 'idc',
    'notify_url' => SELF_URL.'/notify.php',
    'return_url' => SELF_URL.'/postpayment.php',
    'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAt7QbTvE8HikeED5ouSqTAQk/wC/2ktNHbgRXozrK07ATC26VJCYTNn/xh7/qtC1L3qSMlDbDL8f4xeF/Eb4Wn8mbfhTt7oaYoX8wqrhzH0Sfi+SKRx/oPbD1ypbjwybj3Pby2Wgg1XcVJX31YMr5DQ0z493kmqdm8QDOoGYwfH9Zn+pRKB1CSSBcG/BgwELxQ+JdsC6BrUzRCgnU4fO78z0U3LxdfQy8+s/+1MTq/7Q7oZQaOEdt6AeAApfN7RXCeRduV7fTXNgWhxDyQvK/9edjeyYjSQXihZrOeduUNBBm87Ly/zg2GPCOQsMpak35sWvVxzG/JOSrQc67h6gSMwIDAQAB',
    // 加密方式： **RSA2**
    'private_key' => 'MIIEpQIBAAKCAQEAtcUE2UuViOHW5CG55wK5CFDRrJXaumUoIfEvVBVuNEv03vQci4JQbeRpgsUIm9xraAuglEREcMuzBHfFtuz1pl8wYsMZtqUDl9zFI9y06hhK5ZB9aQikf3Ep/aqgMwbBPJZss/nIEWPrEsts5IN3MWnvXsbMQUgIDUlnulP34H3P9e+PkzMK6hvUj+0uXAM/EC9L4rjVVRBD3FMucUjze7FW29FGI/8oMxeyrulV47u/5u/Gt6X0fCmdR/XeTThbutog0vLa3mWApPqAqJpr5HOkUGDCdCTi6wjdz4zvmdxKVeYEPShbJKKrdXOZGoJL76HSa7FwYc+Y6IdhlZIkdwIDAQABAoIBAQCyUypxn8SBOMbgovHF4Bb1QIyjm5StfuZDfmGnRSsL5WTDgouqllsfpJGauIC8oB9DQPz12I+odT8YaASxdIF/Ci3nBm7oj7UZvH4vs6xNaS25T+qpK9BuMvA2K7nktYDIVu8oFiogXX1Wv/oBqbQ65ynuOmxSsz8rAdPgqdYqBrt7s7rUDjKyD+BEGCE8oYXf1A1Wsm91MKkFv86ndBr+fRWFtBbSKpdahN7uklGz72+LFIYxfvuWrp7pfTk6C52KkXNtgslKMbGwQrVpdTFaecsctSLYOtoBRvWj9o+6CdA9PcDumK38tl1Vbg28DHLlSRODlHc7TzUwlLs0MKT5AoGBAOlEIG2tujgLZnJAWrmYm2ZOzccTSHFpCevQc6nPkc/l0RydmeyVtC7NiDUoCsmY9sg1e1F5AqCusY+4wXWWo3ILvpoSvq4K7x1G0/l81tL+6C+K45xS/qdZmPvUVCDqjeWc4MxB2sXrUIl89gBnF1l4o6tv5ukvdtcfIOWgcBl1AoGBAMd8FHVvqK4cQCWolIqKNdLA726W+OJxvGlvw+5/qUwJYAzffYpKSOG7vQbR+mYHBWiaSRKnsGcaXZzKbmII8E8n0rjS+vvHuYDWDFqdm9+EN38tbsjyD0L6OeZflyhfe+cOyPvPQna9JdUsaOUvFDsmnYnVUxNR1vwyxV0ds9y7AoGBAN4/G4qEMF1/dx8583bLUJw8TtDyrV3ojxxPYjQTYUCsHP1fpy0DQUYqazECMqz7AX2lfxYT7o37g4+En0YSvS1GxVX0sBoQrtu9BO+6os8rMTtC4DOr25bExf6BwZoPAB0ZyBC0WeWimvwzxAqELnn/eCk6F85qe5bgwK4nm0aVAoGBAIex26jWv4NQLEJxnjlvMpWeMECl6b7/Zw7BvCHsLRlP90pKbHc5eMI0lqyhAReOBxvUd4h9EP3RbYROHzAIrI7ro+edfKTwgzskX1r0gydUJPwZx5ZhMgh5dhFDTOtlqD7QS98eaTOkDqwnfWMI11Y1OkycE9q8fOUpFB/3KHYpAoGASS/oojFE1+nh+8RXkYNbmjxcxN6nvXJaUH/6AkxiRHYFO5jS2FBaSwKWhSNrvqrNG/gPUpUKM9LWJHP5Jk8Df3Xk7j+MVFIkqX+gA9P5TDNUzi48y5O6LUfnppVHo+E+spacQ6evwBQNYBqvLQMfxSofXsFXRhXHQ3dt5ZeHhjw=',
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
