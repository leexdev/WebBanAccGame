<?php
//thong tin tich hop
$url  = 'https://trumdoithe.com/api/card-auto.php';
$apikey = 'gPlbzjRaJHKVwShmfMECqNeuQoYIGBTnXycFtxAdDOWZUrikLsvp'; 


    function creatSign($partner_key, $params)
    {
        $data = array();
        $data['request_id'] = $params['request_id'];
        $data['code'] = $params['code'];
        $data['partner_id'] = $params['partner_id'];
        $data['serial'] = $params['serial'];
        $data['telco'] = $params['telco'];
        $data['command'] = $params['command'];
        ksort($data);
        $sign = $partner_key;
        foreach ($data as $item) {
            $sign .= $item;
        }
		
		//return $sign;

        return md5($sign);
    }


    // Vào File Card.php Để Nhập Key Ạ 