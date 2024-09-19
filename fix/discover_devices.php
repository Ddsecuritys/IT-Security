<?php
$subnet = '192.168.1'; // Adjust this to your subnet
$foundDevices = [];

for ($i = 1; $i < 255; $i++) {
    $ip = "$subnet.$i";
    $output = null;
    $result = null;

    // Ping the IP address
    exec("ping -c 1 -W 1 $ip", $output, $result);
    if ($result === 0) {
        // If ping is successful, assume it's a CCTV camera for demonstration
        $foundDevices[] = [
            'ip' => $ip,
            'type' => 'CCTV Camera', // Placeholder for actual device type
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($foundDevices);
?>
