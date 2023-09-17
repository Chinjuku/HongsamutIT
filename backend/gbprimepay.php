<?php
class GBPrimePay
{
    private string $url;
    private string $token;
    private string $public_key;
    private string $secret_key;
    private bool $isToken = true;
    /**
     * Documents
     * https://doc.gbprimepay.com/
     * @param env 
     */
    public function __construct(string $env = 'production')
    {
        if ($env == 'production') {
            $this->url = 'https://api.gbprimepay.com';
        } else {
            $this->url = 'https://api.globalprimepay.com';
        }
    }
    public function parse_data(array $data)
    {
        $fields = '';
        $index = 0;
        foreach ($data as $key => $value) {
            $index += 1;
            $fields .= $key . '=' . urlencode($value);
            if ($index != count($data)) {
                $fields .= '&';
            }
        }
        if ($this->isToken) {
            $fields .= '&token=' . urlencode($this->token);
        } else {
            $fields .= '&publicKey=' . $this->public_key;
            $concatstring = $data['amount'] . $data['referenceNo'] . $data['responseUrl'] . $data['backgroundUrl'];
            $checksum = hash_hmac('sha256', $concatstring, $this->secret_key, false);
            $fields .= '&checksum=' . $checksum;
        }
        return $fields;
    }
    public function request(string $path, array $data)
    {
        $fields = $this->parse_data($data);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . '' . $path,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    /**
     * Documents
     * https://doc.gbprimepay.com/qrcash
     * @param mode qrcode or text
     */
    public function promptpay(array $data, string $token, string $mode = 'qrcode')
    {
        $this->isToken = true;
        $this->token = $token;
        if ($mode == 'qrcode') {
            $path = '/v3/qrcode';
        } else {
            $path = '/v3/qrcode/text';
        }
        $response = $this->request($path, $data);
        if ($mode == 'qrcode') {
            return 'data:image/png;base64,' . base64_encode($response);
        } else {
            return $response;
        }
    }
}
