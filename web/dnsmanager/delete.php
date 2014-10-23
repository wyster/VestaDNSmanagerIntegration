<?php
/**
 * @author Ilya Zelenin <wyster@make.im>
 */

require __DIR__ . '/functions.php';
$configDnsManager = dnsManagerGetConfig();
if ($configDnsManager['enabled'] && count($configDnsManager['dns']) > 0) {
    foreach ($configDnsManager['dns'] as $master) {
        $master = array_map(function ($value) {
            return trim($value);
        }, explode(',', $master));
        list($url, $login, $password) = $master;

        $dnsManagerParams = array(
            'out' => 'text',
            'authinfo' => $login . ':' . $password,
            'elid' => $v_domain,
            'func' => 'domain.delete'
        );

        try {
            $dnsManagerResponse = dnsManagerSendRequest(dnsManagerBuildUrl($url), $dnsManagerParams);
        } catch (Exception $e) {
        }
    }
}