?php

require_once __DIR__ . '/func.php';

$ip = ['100.10.20.30'];
$allowed_ips = ['125.0.0.5', '100.10.20.*', '127.0.0.1'];

if (!getAccess($ip, $allowed_ips)){
    die('Access forbidden');
}else{
    echo 'Access ok';
}
