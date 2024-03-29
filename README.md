
<p align="center">
<a href="https://packagist.org/packages/lintangtimur/ovoid"><img src="https://img.shields.io/packagist/v/lintangtimur/ovoid.svg?style=popout-square"></a>
  <a href="https://github.com/lintangtimur/ovoid/blob/master/LICENSE"><img src="https://img.shields.io/github/license/lintangtimur/ovoid.svg?style=popout-square"></a>
  <a class="badge-align" href="https://www.codacy.com/app/lintangtimur/ovoid?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=lintangtimur/ovoid&amp;utm_campaign=Badge_Grade"><img src="https://api.codacy.com/project/badge/Grade/9699ecb8baf64fdb94692b90b01c73b1"/></a>
</p>
<h2 align="center">Un-Official ovoid API Wrapper</h2>

Telah di test pada OVO versi 2.11.1 | 16 Juni 2019 | PHP 7.3.*

| Method  | Result  |
|---|---|
| `login2FA`  | OK |
| `login2FAVerify`  | OK |
| `loginSecurityCode`  | OK  |
| `getBudget`  | OK  |
| `balanceModel`  | OK  |
| `logout`  | OK  |
| `unreadHistory`  | OK  |
| `getWalletTransaction`  | OK  |
| `generateTrxId`  | OK  |
| `transferOvo`  | OK  |

## PORTS
Jika PHP tidak nyaman bagimu bisa mencoba bahasa pemrograman lain, atau jika ingin menulis dibahasa tersebut silahkan ajukan Issue baru nanti akan saya list disini

### Python
- [@anysz/ovopy](https://github.com/anysz/ovopy) by [anysz](https://github.com/anysz)

### GO
- 

### Java
- 

### Javascript / nodejs
-

## Install
`composer require khenop/ovoid`

## Login
### first step
```php
require 'vendor/autoload.php';
use Khenop\OVOID;

$ovoid = new OVOID();
echo $ovoid->login2FA('<mobilePhone>')->getRefId());
```
### second step
```php
echo $ovoid->login2FAVerify('<refId>', '<OTP code>', '<mobilePhone>')->getUpdateAccessToken();
```
### third step
```php
echo $ovoid->loginSecurityCode('<pin code>', '<updateAccessToken>')->getAuthorizationToken();
```

## Balance Model
### Get Payment Method
`getPaymentMethod()`

### Get Card Balance
`getCardBalance($payment_method)`

### Get Card No
`getCardNo($payment_method)`

## EXAMPLE
```php
<?php

require 'vendor/autoload.php';

use Khenop\OVOID;
$ovoid = new OVOID($authToken);
dd($ovoid->modelBalance()->getBalance()->getCardNo()('OVO'));
```

## Profile Model

## Permission Model

## Transfer Sesama OVO
<pre>
Telah di test di OVO 2.11.*
</pre>

```php
public function transferOvo($to_mobilePhone, $amount, $message = null)
```
Sementara hanya bisa 2 kali transfer, untuk transfer ke-3 dari OVO butuh header signature. Jika ada yang bisa menemukan proses signaturenya silahkan ajukan pull request dengan senang hati :)

## Transaction History
```php
/**
     * Wallet Transaction
     *
     * @param int $page halaman ke berapa
     * @param int $limit berapa kontent dalam 1 page
     * @return \Khenop\Response\WalletTransactionResponse
     */
    public function getWalletTransaction($page, $limit = 10)
```
disitu ada hardcode productType 001, bisa dicoba sendiri itu efek terhadap apa, karena saya tesnya hasil transfer sesama OVO.

### Mendapatkan semua notif
```php
    /**
     * get all notification
     *
     * @return \Khenop\Response\NotificationAllResponse
     */
    public function allNotification()
```

### Cek berapa notifikasi yang belum dibaca
```php
/**
     * mendapatkan total unread history
     *
     * @return \Khenop\Response\NotificationUnread
     */
    public function unreadHistory()
```
Contoh: `$ovo->unreadHistory()->getTotal()`

## TODO
- [x] cek mutasi


## Contribute
Project ini saya membuatnya kasaran sekali, jadi ketika ada proses request ke endpoint ovo dan terjadi kegagalan atau parameter tidak sesuai, script masih belum bisa mendapatkan response error dari ovo nya, harus manual `dd` dari source code(dari file Response). Jadi silahkan berkontribusi, baik dari dokumentasi program atau membenahi script ini :)

## note
Project ini saya ambil dari [lintangtimur](https://github.com/lintangtimur), terima untuk pihak terkait, project ini hanya penyempurnaan dari  [lintangtimur](https://github.com/lintangtimur), untuk versi asli, bisa dilihat di github [lintangtimur](https://github.com/lintangtimur)
