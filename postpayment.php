<?php
    require("functions.php");
 ?>
<html>
<head><title>正在跳转</title></head>
<body>
<?php
        srand((double)microtime()*1000000);
        $rkey = rand();
        
        $data = Yansongda\Pay\Pay::alipay($config)->verify(); // 是的，验签就这么简单！
        
        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
        $transId = $data->out_trade_no;		 //Pass the same transid which was passsed to your Gateway URL at the beginning of the transaction.
        $sellingCurrencyAmount = $data->total_amount;
        $accountingCurrencyAmount = $data->total_amount;

        $status = $data->total_amount == $accountingCurrencyAmount?"Y":"N";
        $checksum =generateChecksum($transId, $sellingCurrencyAmount, $accountingCurrencyAmount, $status, $rkey, $key);
?>
<form name="f1" action="<?php echo $redirectUrl;?>" method="post">
	<input type="hidden" name="transid" value="<?php echo $transId;?>">
	<input type="hidden" name="status" value="<?php echo $status;?>">
	<input type="hidden" name="rkey" value="<?php echo $rkey;?>">
	<input type="hidden" name="checksum" value="<?php echo $checksum;?>">
	<input type="hidden" name="sellingamount" value="<?php echo $sellingCurrencyAmount;?>">
	<input type="hidden" name="accountingamount" value="<?php echo $accountingCurrencyAmount;?>">
	<input type="submit" value="点击继续"><BR>
</form>
<script type="text/javascript">
	window.onload=function(){
		document.forms["f1"].submit();
	}
</script>
</body>
</html>