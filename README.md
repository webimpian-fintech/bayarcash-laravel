## Laravel Package for Bayarcash Payment Gateway

This package is to enable online payment channel via Bayarcash Payment Gateway.

## Installation

You can install the package via composer:

```bash
    composer require webimpian/bayarcash-laravel
```

### Publish Assets

```bash
php artisan vendor:publish --tag=bayarcash-laravel-assets 
```

### Publish Config File

```bash
php artisan vendor:publish --tag=bayarcash-laravel-config 
```

### Publish Controller

```bash
php artisan vendor:publish --tag=bayarcash-laravel-controller 
```

### Publish Form Request

```bash
php artisan vendor:publish --tag=bayarcash-laravel-form-request 
```

### Set required configuration

```
    'route_prefix' => 'bayarcash-payment',
    'middleware'   => ['web'],
    'portal_key'   => YOUR_PORTAL_KEY,
    'bearer_token' => YOUR_BEARER_TOKEN,
```

### Example
You can open sample form with all the required fields to perform the payment process using this url  `/bayarcash-payment/add`.

- to initiate payment, submit POST request to `/bayarcash-payment/init` with all the required data.
  ```
  buyer_name:john doe //required
  buyer_tel_no:60199009000 //nullable
  buyer_email:j.doe@gmail.com //required
  order_no:12345 //required
  order_amount:10.00 //required
  raw_website: //nullable
  payment_gateway:1 //required. 1 for FPX
  ```
- to requery transaction status, submit GET request to `/bayarcash-payment/requery?RefNo=YOUR_TRANSACTION_REF_NO`


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email faiz@webimpian.com instead of using the issue tracker.