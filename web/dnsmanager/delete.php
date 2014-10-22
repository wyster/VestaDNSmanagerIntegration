<?php
/**
 * @author Ilya Zelenin <wyster@make.im>
 */
$configDnsManager = require __DIR__ . '/config.php';
if ($configDnsManager['enabled']) {
    $dnsManagerParams = array(
        'authinfo' => $configDnsManager['login'] . ':' . $configDnsManager['password'],
        'elid' => $v_domain,
        'func' => 'domain.delete'
    );
    $dnsManagerResponse = file_get_contents($configDnsManager['url'] . '?' . http_build_query($dnsManagerParams));
}