<?php
header('Content-Type: application/json');

$response = [
    'gateway' => '',
    'local_ip' => '',
    'subnet_mask' => '',
    'hostname' => gethostname(),
];

// Determine the operating system and get the network information
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    // Windows
    $output = shell_exec('ipconfig');

    // Get Default Gateway
    preg_match('/Default Gateway.*: ([\d\.]+)/', $output, $gatewayMatches);
    if (isset($gatewayMatches[1])) {
        $response['gateway'] = $gatewayMatches[1];
    }

    // Get Local IP Address
    preg_match('/IPv4 Address.*: ([\d\.]+)/', $output, $localIpMatches);
    if (isset($localIpMatches[1])) {
        $response['local_ip'] = $localIpMatches[1];
    }

    // Get Subnet Mask
    preg_match('/Subnet Mask.*: ([\d\.]+)/', $output, $subnetMaskMatches);
    if (isset($subnetMaskMatches[1])) {
        $response['subnet_mask'] = $subnetMaskMatches[1];
    }

} else {
    // macOS and Linux
    $output = shell_exec('ip route');

    // Get Default Gateway
    preg_match('/default via ([\d\.]+)/', $output, $gatewayMatches);
    if (isset($gatewayMatches[1])) {
        $response['gateway'] = $gatewayMatches[1];
    }

    // Get Local IP Address and Subnet Mask
    $localInfo = shell_exec('ifconfig');
    preg_match('/inet ([\d\.]+)/', $localInfo, $localIpMatches);
    preg_match('/netmask ([\d\.]+)/', $localInfo, $subnetMaskMatches);

    if (isset($localIpMatches[1])) {
        $response['local_ip'] = $localIpMatches[1];
    }
    if (isset($subnetMaskMatches[1])) {
        $response['subnet_mask'] = $subnetMaskMatches[1];
    }
}

// Return the response as JSON
echo json_encode($response);
