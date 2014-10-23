<?php
/**
 * @author Ilya Zelenin <wyster@make.im>
 */

/**
 * @return array
 */
function dnsManagerGetConfig()
{
    $config = parse_ini_file(__DIR__ . '/config.ini');
    return $config;
}

/**
 * @param string $name
 * @return string
 */
function dnsManagerBuildUrl($name)
{
    if (filter_var($name, FILTER_VALIDATE_URL)) {
        return $name;
    }
    return "https://{$name}/manager/dnsmgr";
}

/**
 * @param string $url
 * @param array  $params
 * @return string
 * @throws Exception
 */
function dnsManagerSendRequest($url, $params)
{
    if (function_exists('curl') === false) {
        throw new Exception('Curl not installed');

    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    if (preg_match('|<error code="100">access deny</error>|', $response)) {
        throw new Exception('DNSmanager access deny!');
    }

    if (empty($response) || preg_match('|ERROR|', $response)) {
        throw new Exception('Failed to synchronize with DNSmanager');
    }

    return $response;
}