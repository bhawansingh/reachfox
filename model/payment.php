<?php
class Payment{
<<<<<<< HEAD
    public function pay(){
        $req = curl_init('https://www.beanstream.com/api/v1/payments');

       $merchantId = 300201485;
        $passcode = "19Ff725dBAF74572b076fABD171C3b4F";
        $auth = base64_encode( $merchantId.":".$passcode );

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Passcode '.$auth
        );

        curl_setopt($req,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($req,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($req,CURLOPT_HEADER, 0);

        $post = array(
            'merchant_id' => 300201485,
            'order_number' => '10000123',
            'amount' => 100.00,
            'payment_method' => 'interac'
        ); 

       // print_r($post);

        curl_setopt($req,CURLOPT_POST, 1);
        curl_setopt($req,CURLOPT_POSTFIELDS, json_encode($post));

        $res_json = curl_exec($req);
        $res = json_decode($res_json);

        curl_close($req);

        print_r($res);

    }


    public function pay2(){
=======
    public function pay($totalPay){
>>>>>>> bhawan-reachfox
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
<<<<<<< HEAD
            'amount' => 100.00,
=======
            'amount' => $totalPay,
>>>>>>> bhawan-reachfox
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
<<<<<<< HEAD
        if (strpos($result,"approved"))
            print("Payment Successful!");
        else
            print_r("as".$result);
        curl_close($req);

                      


    }
=======
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

>>>>>>> bhawan-reachfox
}


?>