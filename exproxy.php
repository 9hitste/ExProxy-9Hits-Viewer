<?php
/**
 * Encrypt your proxy through the 9Hits API
 *
 * This method encrypts your proxy to protected it.
 *
 * @param  proxy|array of proxy information
 *
 * @return object
 */
function encryptProxy($proxy) {
    $url = 'http://proxy.9hits.com/we/encrypt-proxy?input='.urlencode(base64_encode(json_encode($proxy)));
    $result = json_decode(file_get_contents($url));
    return $result;
}

// Your code to get one proxy from your database or any source.
// Make sure your source code returns a unique proxy
// ......

$proxy = [
    'type' => 'http',               //must be one of ["socks4", "socks5", "http", "ssh"]
    'server' => '1.12.123.4:80',   //required
    'user' => 'admin',             //optional
    'password' => '123456'         //optional
];

$result = encryptProxy($proxy);
/*
The result should be an object like this
{
    "status": "ok|error",
    "message": "Message from the 9Hits server",
    "input": your input,
    "output": Encrypted proxy
}
*/
echo $result->output;
?>
