<?php

error_reporting(0);
mb_internal_encoding('UTF-8');

// Function to check if an IP is in a given range
function ip_in_range($ip, $range) {
    if (strpos($range, '/') === false) {
        $range .= '/32';
    }
    list($range, $netmask) = explode('/', $range, 2);
    $range_decimal = ip2long($range);
    $ip_decimal = ip2long($ip);
    $wildcard_decimal = pow(2, (32 - $netmask)) - 1;
    $netmask_decimal = ~ $wildcard_decimal;
    return (($ip_decimal & $netmask_decimal) == ($range_decimal & $netmask_decimal));
}

$ip_address = $_SERVER['REMOTE_ADDR'];
$ip_headers = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_CF_CONNECTING_IP', 'HTTP_FORWARDED_FOR', 'HTTP_X_COMING_FROM', 'HTTP_COMING_FROM', 'HTTP_FORWARDED_FOR_IP', 'HTTP_X_REAL_IP'];

if (!empty($ip_headers)) {
    foreach ($ip_headers as $header) {
        if (!empty($_SERVER[$header])) {
            $ip_address = trim($_SERVER[$header]);
            break;
        }
    }
}

$request_data = [
    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    'referer' => !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
    'ip_address' => $ip_address
];

$filter_page = 'offer'; // Default filter page

// Local filtering logic
$block_ips = [
    '123.123.123.123', // Add specific IP addresses you want to block
    '124.124.124.0/24', // Add IP ranges in CIDR notation
];

$block_user_agents = [
    'Googlebot',
    'Bingbot',
    'Slurp',
];

$block_referers = [
    'example.com',
    'spam.com'
];

// Check IP against blocked IPs
foreach ($block_ips as $block_ip) {
    if (ip_in_range($ip_address, $block_ip)) {
        $filter_page = 'white';
        break;
    }
}

// Check User Agent against blocked User Agents
foreach ($block_user_agents as $block_user_agent) {
    if (stripos($_SERVER['HTTP_USER_AGENT'], $block_user_agent) !== false) {
        $filter_page = 'white';
        break;
    }
}

// Check referer against blocked referers
foreach ($block_referers as $block_referer) {
    if (stripos($request_data['referer'], $block_referer) !== false) {
        $filter_page = 'white';
        break;
    }
}

// Define your offer and white pages
$offer_page_path = 'offer_page.php'; // Local path to your PHP offer page
$white_page_path = 'white_page.html'; // Local path to your HTML white page

// Serve the appropriate page
if ($filter_page == 'offer') {
    if (file_exists($offer_page_path)) {
        require_once($offer_page_path);
    } else {
        exit('Offer Page Not Found.');
    }
} else {
    if (file_exists($white_page_path)) {
        echo file_get_contents($white_page_path);
    } else {
        exit('White Page Not Found.');
    }
}

?>
