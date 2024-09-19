<?php
header('Content-Type: application/json');

// Change this to your subnet
$subnet = '192.168.1'; // Example subnet
$liveHosts = [];

for ($i = 1; $i < 255; $i++) {
    $ip = "$subnet.$i";
    if (ping($ip)) {
        $liveHosts[] = $ip;
    }
}

echo json_encode($liveHosts);

function ping($ip) {
    $output = null;
    $result = null;
    exec("ping -c 1 -W 1 $ip", $output, $result);
    return $result === 0;
}
