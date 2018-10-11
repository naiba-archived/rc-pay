<?php
require("functions.php");	//file which has required functions
$alipay = Yansongda\Pay\Pay::alipay($config);
try {
    $data = $alipay->verify(); // 是的，验签就这么简单！
    Yansongda\Pay\Log::debug('Alipay notify', $data->all());
    // 拼接CURL参数
    $transId = $data->out_trade_no;		 //Pass the same transid which was passsed to your Gateway URL at the beginning of the transaction.
    $sellingCurrencyAmount = $data->total_amount;
    $accountingCurrencyAmount = $data->total_amount;
    srand((double)microtime()*1000000);
    $rkey = rand();
    $status = $data->total_amount == $accountingCurrencyAmount?"Y":"N";
    $checksum =generateChecksum($transId, $sellingCurrencyAmount, $accountingCurrencyAmount, $status, $rkey, $key);
    $post_data = "transid=".$transId."&status=".$status."&rkey=".$rkey.
    "&checksum=".$checksum."&sellingamount=".$sellingCurrencyAmount."&accountingamount=".$accountingCurrencyAmount;
    // 异步通知
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $redirectUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $output = curl_exec($ch);
    curl_close($ch);
    if (strpos($output, 'automatically get redirected') !== false||strpos($output, 'AuthStarted') !== false) {
        Yansongda\Pay\Log::debug('Resellerclub Push OK', array(
            'transID' => $transId,
            'qrID'=>$data->trade_no,
        ));
        $alipay->success()->send();
    } else {
        throw new Exception($output, 1);
    }
} catch (Exception $e) {
    Yansongda\Pay\Log::debug('Resellerclub Push Fail', array(
        'transID' => $transId,
        'qrID'=>$data->trade_no,
        'output'=>$e->getMessage(),
    ));
    echo("fail");
}
