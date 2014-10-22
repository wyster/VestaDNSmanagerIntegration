<?php
/**
 * @author Ilya Zelenin <wyster@make.im>
 */
$configDnsManager = require __DIR__ . '/config.php';
if ($configDnsManager['enable']) {
    $dnsManagerParams = array(
        'sok' => 'yes',
        'out' => 'json',
        'authinfo' => $configDnsManager['login'] . ':' . $configDnsManager['password'],
        'domain' => $v_domain,
        'master' => $configDnsManager['master'],
        'func' => 'domain.record.edit'
    );
    $dnsManagerResponse = file_get_contents($configDnsManager['url'] . '?' . http_build_query($dnsManagerParams));
}