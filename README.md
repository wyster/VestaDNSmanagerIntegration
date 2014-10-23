Install
==========================
This guide actual for Vesta version 0.9.8-10

Unpack the module in the root directory of ```vestacp```

Open ```web/add/dns/index.php```, find the line ```~116```:
```php
$_SESSION['ok_msg'] = __('DNS_RECORD_CREATED_OK',$_POST[v_rec],$_POST[v_domain]);
```
Paste before:
```php
require $_SERVER['DOCUMENT_ROOT'] . '/web/dnsmanager/add.php';
```
Open ```web/edit/dns/index.php```, find the line ```~35```:
```php
exec (VESTA_CMD."v-delete-dns-record ".$v_username." ".$v_domain." ".$v_record_id, $output, $return_var);
```
Paste after:
```php
require $_SERVER['DOCUMENT_ROOT'] . '/web/dnsmanager/delete.php';
```
In the configuration ```web/dnsmanager/config.ini```, change ```enabled``` to ```1```, and set ```master```, ```dns[]``` 

Example using many dns:
```ini
dns[] = example.com,login,password
dns[] = example2.com,login,password
```