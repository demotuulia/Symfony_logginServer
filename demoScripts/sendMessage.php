<?php
/**
 * Class sendMessage
 *
 * This is a demo script how to send messages to logging server with
 * raw php (without Symfony framwork)
 *
 * Note: If there are problems, verify first the memeber variables in section
 * 'CONFIGURATION'
 *
 *
 * USAGE : php demoScripts/sendMessage.php name "NAME_OF_THE_SYSTEM" level LEVEL_NRO type TYPE_NRO message MESSAGE
 *
 *
 */

class sendMessage{


    /**
     * CONFIGURATION
     *
     * The private members $apiBaseUrl, $apiKeys and $privateKeys
     * are dependent of the configuration of this system.
     * See details how to check correct configuration above each param.
     *
     */

    /**
     * Api Base url
     * 
     * This must be the same as 'api_base_url' in file app/config/parameters.yml
     * 
     * @var string
     */
    private $apiBaseUrl = 'http://loggingserver.io/api/insertlog/';


    /**
     * apiKeys
     *
     * The should be the same as in table and column 'client_systems'.'apikey'
     *
     * @var array
     */
    private $apiKeys = [
        'Test 1' =>'dsf23sf',
        'Test 2' =>'234324dsf23sf',
        'Test 3' =>'sdfgfdsf23sf',
        'Test 4' =>'23234ffff23sf',
    ];

    /**
     * privateKeys
     *
     * These should be the same as in
     * /app/config/parameters_test.yml
     *
     * @var string
     */
    private $privateKeys = [

        'Test 1' =>

'-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----',


        'Test 2' =>

            '-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----',


        'Test 3' =>

            '-----BEGIN RSA PRIVATE KEY-----
MIIJJgIBAAKCAgEAr73Pq50+jlQRZgYx6+vnm2ib9H1mWmcOZ2qWc/XGMKeKgZEg
I02RIe9rEm+gstvRI/gMVGstjdxZWYwZG5RTjbMREoZOv3RlA1pqKSmzrLmKowkK
cKdG+NwEhe4mWViDvuMgF7/dkDdppZVx8yroQ1LlO+N0wrYfCzyRzCp6pZzDGrwp
3qsrasqow1I1P2JI8ubpOjEfq0uIAVhboh1aE3HujHQKQWP8FTBAHJNWnKMRp1yi
UfykgVea7CyU0GLDm39Xr/u9jQFa915PFw2dEBSvR1Yq/POK+JakC41LJFO7R+Jt
N3Tp1qPJ1IWEiu4pu/DqDGuMKj2OrY7zFgqaRU+bp9PSUto44nC0YiKXQnxHXMd8
iPaNhvG56x+xfz0+aKXCFDQEHlr22sJmMSFTwC16Inw5IPCr/hvwhpGgf2Pw0EFi
94/LkQiDxpm7llKvv+LbNI9O54mTZGrSak8IVvokRg0aszaH9fFDT1Gsi9za76lo
wPhmUTjNYag2HULoHKKr/rxd0FIxYDWgKFhqxrfjvYptrxvNhL0XOL4KnfX/W7xy
s5gesCA4Q32gDdAEEvEC0GpR9uoDFN0PrxdrEs8sKMisLTBYs70MAq+mgJzR6Lwq
jxWdc5RCr0JD2Kayd/IovzCVyBPtnbKWotYjOJf4rr6if6sgaX0eXjWi4jMCAwEA
AQKCAgB6Eew4FkcncbmMFm2CpCACUM1TK+92h/L3XpAXB/acQSPyD641F2HiIn1L
FwKWeh1xUJCv6qp/yTi+/JNMFuFaobEQHv5/+gdYJutqoC7PoSltSZBY47hmj90M
cnlswhDw/K6EEJ+D1xmpDH9UGs+uQ9w6lym5PeueUHotSKxccOEMpvqmUlscGJzU
3zthRZHKNx51bz3CK/rShF9R4fV5YEAEi228MgkdZqCBuM4GizZt++g77rMNrJ5N
wkGz5YZdcjykXsYxNWnMPVPOfYRFcTi24mGFxl0Xgvt7kq9JEmgZ7GtUg/8ROj+t
QPjpz7hpdVP9QI7hoFSEtbCf9Mlmh4Vq9ZJkU1MUXFoupjAimRcVHJa39A9z0Ml8
kYZQUB5bPp9jde7GqvsMiZoYZaY4/a68tcIZ0q3TsHHQCMJ6bw7hkoaJrjOtJgKm
gqZf/eox8cjDSctYQz7LzCj7oOLMP448raQS2Ga91gI1OdwYyqQoAT6KBeGlgpnf
wC58QlB3We35R1RPNOb+FAWQXGnOO02z30HYUpoJKBJJq4yrplyucPu23Qd7Jg1Z
UP12qePgkFmlhvskD9O78Qt+gdTADLqm54Ew1R7Salfj2JNSP8XOJVwerR8xHt0z
bVVXfMntOl0D4yK9SfMiYMRcBiWyhBoVPjmyBxOjd6fQMjP5oQKCAQEA6RYp0rE/
Q2MhmV7hUlS2Rgj2U7E3aKThr/8qdaXo+6Y4hB6huMXTtPCeD8bJjDZ9xMZViJYh
TPM6/iTz1iV05v09qTygtSbOBOw8wBO0k8mwyeo4W62auFFEMEh+4OKdb/8z7iMR
UjvC09cxafMAuMXjlldpcnft0R+YILx6Vo4bDTgk5zLGyL7CXEoVdkkQr9kjprmN
iwyfXSd94lfuCKNyHRwaA9XGNOxEBgNNknNQF/br12Px4mky6skEIKllUvO2gIMd
hkKu4vYr9zzT2GmyjRKBQ5GJbDz2xTJZj8iKspPx/gLHcd6LAHyz6vT2qoLe3PIY
BjhKJpSilggBGwKCAQEAwQSBX39uRyDunBGhm8xPww/V0FOnyHcx0wPRmNT4jiax
63qnGaNJ/1/kYVW2VmsWUfB3ZAEHSIfP0wahTj5vCqj/2qHJ4EsaFMpLbnyH9PDh
MoCkGS8g2S6EFpDCWxeO2qZ7I0VTeQ6QJgD3z2aRhnflaNvxm+NHhYKbWPGWJE2I
6MEAKt0aBMX55Ch8fAQ0q3zYPTj5trYOESEycMSWEFYX3KtCX+pYalI4oqmhjNsg
MwBR8HKHkl8d4QDbuYqoESRk/3fvyaufPLYT/jrB+TZ/vv2T3sSa+Zd2LsKgLai8
vLHofnHu2OA55KR+5IM6KwZMdH6zmqmM8nDmUXJMyQKCAQA0+228T7/yoGj1xORw
44KfPtBHS+QtbDVE3TqYjYL9GNaF6bSXHJi3623yZhxQO96wyOiOaJnfNPa26E1o
4xDEpNHMU1SweMahxdU1UAVfBpyh+RSgekDOHuLiGsiEc96Xo6n5Oo1oZN8vah34
WF1Uot7NwMbeVzZ+r7DT2CPy4tBxW86/owIehYYGlmx0e71IS5JYBpuO/OqIsT5j
IdugqQ56YXXkY0Zvpzj7KOsMHBwbpmwLhNNpxMHnLpQ6nGbEyVM1uRgP+b5pJs3t
oC0DZ1tHx+oMItva96ycPIqxLUOhvhFmzNjrIEv2a2I2SUJ8lcz06i7d0xO/209t
zRn7AoIBAQCYhMDd/0natrEVbfEvtRBJ6JdhmNj51QXv4hKbG56UZQsuMasc3SS5
wMIsD5iXTONEOCl/QjjJHVghPhn0Q+1mlQgncLSeoXmod/mHAqxD5ptsVq5UoCLq
upDxa83IQSNGr0qaIkvFWraY8SbgIgJYKSGD7FhMgBmh7ARpEe08HnBSyz8gn7nR
j8bYfQ1wybn80BfmuMDJma4f5wV+ijiyC/WrD0DRndHjobjTAAuBzBzzcAtPXpC2
HqbzhsQZJvGLKiEMpW87Anw/cvj1aOSh0mi7OJDB9MUo+IAQjwYXTkBlMoeucsTz
ZqsYessyMmeiW8XKP9wYGGYhpQi5zwHRAoH/ZthK5OsUUupaLakIIoafSWlTDvmE
ywVMZY0pxA1FFN3vBt7qj2KWuvBk2OTezcxykiz2xJ9OtvtWK6LzISa6lMVUyuqa
duy1EudqvwMrYjGKLyprmMRomDDfT94IHpHYY98mwSvxtoRKRLJffCAa9ZSHeEI/
fbtVIKOMsPT07/Zl0mm++Fse/uCOyq3EpOOQ6qO/mexHchZCzyzJY0IVES3+vOoA
55U/H3yK2YK1a0F2+iF8NCAv9kNNObJed69T2RB9ciVtvDxnDSMWTJY12IJcpSI3
RnMSg6UmbWao4h6atvIXl7vAIEUsKyq5Mm3izA9S4ldRnK5buzkwa7ow
-----END RSA PRIVATE KEY-----',

        'Test 4' =>

'-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----'

    ];





    /**
     * Required parameters to excute this script
     * @var array
     */
    private $requiredInputFileds = [
        'name' => '"NAME_OF_THE_SYSTEM"',
        'level' => 'LEVEL_NRO',
        'type' => 'TYPE_NRO',
        'message' => 'MESSAGE'
    ];


    /**
     * @var string ('TEST 1', 'TEST 2', 'TEST 3' or 'TEST 4')
     *
     */
    private $name;

    /**
     * @var integer (1-3)
     */
    private $level;

    /**
     * @var integer (1-3)
     */
    private $type;

    /**
     * @var string
     */
    private $message;



    /**
     * Read and validate input params
     * 
     * @param $params
     */
    public function readAndValidateInput($params)
    {
        $errors = false;
        foreach (array_keys($this->requiredInputFileds) as $field) {
            $index = array_search($field, $params );
            if ($index) {
                $value = $params[$index + 1];
                $this->$field = $value;
            } else {
                echo ("Field '$field' is missinging.\n");
                $errors = true;
            }
        }

        if ($errors) {
            $usage ='php demoScripts/sendMessage.php ';
            array_walk(
                $this->requiredInputFileds,
                function ($field, $key) use(&$usage) {
                    $usage .= $key . ' ' . $field . ' ';
                }
            );
            die ("\n========================\nUSAGE : $usage\n======================== \n\n");
        }
        
    }


    /**
     *  Send request
     * 
     */
    public function send() {


        //
        // Define values
        //
        $privateKey =    $this->privateKeys[$this->name];
        $apiKey= $this->apiKeys[$this->name];
        $xSignature = $this->createXSignature($this->message, $privateKey);

        $queryParams = ['xSignature' => $xSignature];
        $url = $this->apiBaseUrl . '?' . http_build_query( $queryParams );

        $postFields = [
            'logData' => [
                'level' => $this->level,
                'type' => $this->type,
                'message' => $this->message
            ]

        ];
        $postFieldsStr = json_encode($postFields);

        //
        // Set header
        //
        $header = [];
        $header[] = "Authorization: Bearer " . $apiKey;
        $header[] = 'Content-Type: application/json';
        $header[] = 'Content-Length: ' . strlen($postFieldsStr);

        //
        // Ser curl options
        //
        $curl_options = [];
        $curl_options[CURLOPT_URL] = $url;
        $curl_options[CURLOPT_RETURNTRANSFER] = true;
        $curl_options[CURLOPT_SSL_VERIFYPEER] = false;
        $curl_options[CURLOPT_SSL_VERIFYHOST]= false;
        $curl_options[CURLOPT_CUSTOMREQUEST] = 'POST';
        $curl_options[CURLOPT_POSTFIELDS] = $postFieldsStr;
        $curl_options[CURLOPT_HTTPHEADER] = $header;

        //
        // Send and render results
        //
        $connection = curl_init();
        curl_setopt_array($connection, $curl_options);
        $response = curl_exec($connection);
        $info = curl_getinfo($connection);
        echo ("\n Response code " . $info['http_code'] . "\n");
        if ($info['http_code'] == 201 ) {
            echo ("\n Success \n Inserted log id: $response . \n");
        } else {
            var_dump($response);
        }
    }

    /**
     * Create X-signature
     * 
     * Copy of function 'createXSignature'
     * in /src/AppBundle/Manager/Manager/Entity/ClientSystems.php
     *
     * @param $message
     * @param $privateKey
     * @return string
     */
    private function createXSignature($message, $privateKey){
        $xSignature = "";
        openssl_sign($message, $xSignature, $privateKey, "SHA256");
        return base64_encode($xSignature);
    }
}

$sendMessage= new sendMessage();
$sendMessage->readAndValidateInput($argv);
$sendMessage->send();

