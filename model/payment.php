<?php
class Payment{
    public function pay($totalPay){
        $req = curl_init('https://www.beanstream.com/api/v1/payments');

        $merchantId = 300201485;
        $passcode = "19Ff725dBAF74572b076fABD171C3b4F";
        $auth = base64_encode( $merchantId.":".$passcode );

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Passcode '.$auth
        );

        curl_setopt($req,CURLOPT_POST, true);
        curl_setopt($req,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($req,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($req,CURLOPT_FAILONERROR, true);
        curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);

        $post = array(
            'merchant_id' => $merchantId,
            'order_number' => '100001234',
            'amount' => $totalPay,
            'payment_method' => 'card',
            'card' => array(
                'name' => 'John Doe',
                'number' => '5100000010001004',
                'expiry_month' => '02',
                'expiry_year' => '17',
                'cvd' => '123'
            )
        );        

        curl_setopt($req,CURLOPT_POSTFIELDS, json_encode($post));
        $result = curl_exec($req);
        if (strpos($result,"approved")){
            //update the databe 
            $this->paidPayment($totalPay);
            return 1;
        }
        else
            return 0;
        curl_close($req);

    }

    public function paidPayment($totalPay){
        $dbCon = Database::connectDB();
        $query = "UPDATE cp_payment SET paid=$totalPay
                        WHERE       companyID  = {$_SESSION['companyID']} AND
                                shiftID  = {$_GET['sid']} ";
         //echo $query;
        return $dbCon->exec($query);
    }

}


?>