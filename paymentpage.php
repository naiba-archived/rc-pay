<?php
    require("functions.php");	//file which has required functions
?>	 	
<html>
<head>
<title>正在跳转</title>
</head>
<body>
<?php
        $_GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
        
        $paymentTypeId = $_GET["paymenttypeid"];  //payment type id
        $transId = $_GET["transid"];			   //This refers to a unique transaction ID which we generate for each transaction
        $userId = $_GET["userid"];               //userid of the user who is trying to make the payment
        $userType = $_GET["usertype"];  		   //This refers to the type of user perofrming this transaction. The possible values are "Customer" or "Reseller"
        $transactionType = $_GET["transactiontype"];  //Type of transaction (ResellerAddFund/CustomerAddFund/ResellerPayment/CustomerPayment)
        $invoiceIds = $_GET["invoiceids"];		   //comma separated Invoice Ids, This will have a value only if the transactiontype is "ResellerPayment" or "CustomerPayment"
        $debitNoteIds = $_GET["debitnoteids"];	   //comma separated DebitNotes Ids, This will have a value only if the transactiontype is "ResellerPayment" or "CustomerPayment"
        $description = $_GET["description"];
        $sellingCurrencyAmount = $_GET["sellingcurrencyamount"]; //This refers to the amount of transaction in your Selling Currency
        $accountingCurrencyAmount = $_GET["accountingcurrencyamount"]; //This refers to the amount of transaction in your Accounting Currency
        $redirectUrl = $_GET["redirecturl"];  //This is the URL on our server, to which you need to send the user once you have finished charging him
        $checksum = $_GET["checksum"];	 //checksum for validation

        if (verifyChecksum($paymentTypeId, $transId, $userId, $userType, $transactionType, $invoiceIds, $debitNoteIds, $description, $sellingCurrencyAmount, $accountingCurrencyAmount, $key, $checksum)) {
            $order = [
                'out_trade_no' => $transId,
                'total_amount' => $accountingCurrencyAmount,
                'subject' => $description==""?"IDC 余额充值":$description,
            ];

            $alipay = Yansongda\Pay\Pay::alipay($config)->web($order);
            $alipay->send();
        } else {
            echo "签名不匹配";
        }
?>
</body>
</html>
