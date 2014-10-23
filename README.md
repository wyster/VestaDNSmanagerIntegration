Requirements
==========================
This library requires PHP extension ```php_curl``

Install
==========================
This guide actual for [Vesta Control Panel](http://vestacp.com) version 0.9.8-10

Unpack ```web``` folder in the root directory of ```vestacp```

Open ```web/add/dns/index.php```,

Find the line ```~40```
```php
exec (VESTA_CMD."v-add-dns-domain ".$user." ".$v_domain." ".$v_ip." ".$v_ns1." ".$v_ns2." ".$v_ns3." ".$v_ns4." no", $output, $return_var);
```
Paste after:
```php
require $_SERVER['DOCUMENT_ROOT'] . '/dnsmanager/add.php';
```

Find the line ```~109```:
```php
exec (VESTA_CMD."v-add-dns-record ".$user." ".$v_domain." ".$v_rec." ".$v_type." ".$v_val." ".$v_priority, $output, $return_var);
```
Paste after:
```php
require $_SERVER['DOCUMENT_ROOT'] . '/dnsmanager/add.php';
```

Open ```web/add/dns/index.php```, find the line ```~95```:
```php
exec (VESTA_CMD."v-add-dns-domain ".$user." ".$v_domain." ".$v_ip, $output, $return_var);
```

Paste after:
```php
require $_SERVER['DOCUMENT_ROOT'] . '/dnsmanager/add.php';
```

Open ```web/delete/dns/index.php```, find the line ```~35```:
```php
exec (VESTA_CMD."v-delete-dns-record ".$v_username." ".$v_domain." ".$v_record_id, $output, $return_var);
```
Paste after:
```php
require $_SERVER['DOCUMENT_ROOT'] . '/dnsmanager/delete.php';
```

In the configuration ```web/dnsmanager/config.ini```, change ```enabled``` to ```1```, and set ```master```, ```dns[]``` 

Example using many dns:
```ini
dns[] = example.com,login,password
dns[] = example2.com,login,password
```