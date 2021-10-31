?php

function getAccess($ip, $allowed_ips){
    foreach($allowed_ips as $allowed_ip){
        $parts_allowed = explode('.', $allowed_ip);
        $parts_current = explode('.', $ip);
        foreach($parts_allowed as $k => &$item){
            if($item == '*'){
                $item = $parts_current[$k];
            }
        }
        unset($item);
        $allowed_ip = implode('.', $parts_allowed);
        if($allowed_ip === $ip){
            return true;
        }
    }
    return false;
}