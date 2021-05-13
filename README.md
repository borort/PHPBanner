# PHPBanner
By: Borort Sort

This library controls the display of banners. The solution is part of the Skill Test for xxx job application.

## Assumptions
Based on the [specificiations](SKILL_TEST.en.md) provided, below are my thoughts and assumptions: 

(1) Two classes will be needed: 
- Banner class for creating banner instances
- BannerDisplay class for handling the display of the banners

(2) Banner class shall contain the following properties:
- title
- image
- url
- startDate
- endDate
  
  Banner class should also contain a method that allows the setting of display period (i.e. startDate and endDate) for individual banner.

(3) BannerDisplay class takes an array of banner instances as input and outputs the array of displayed banners based on their display period and additional conditions applied.

(4) With the timezone and internal IP aware requirements, the BannerDisplay class that handles the display of banners should be implemented in such a way that allows testing with custom timezone, current time, and client IP parameters. The default timezone is 'Asia/Tokyo'.

(5) Input data validation, error exception handling, and database layer are not implemented in this scope.

## Requirements

Requirements
- PHP >=7.3.0
- Composer 2
- PHPUnit 9

## Installation and Usage

#### Installing the library in your app

Download the library from Github repository into your app's packages/libraries directory and configure the composer autoload setting in your composer.json file as below:

```
"autoload": {
    "psr-4": {
        "Borort\\PHPBanner\\": "path/to/libraries/php-banner/src/"
    }
}
```
Then run
```
composer update
```


#### Example of how to load and use classes

```php
<?php 
require_once __DIR__ . '/../vendor/autoload.php'; //path to your app's composer autoload
use Borort\PHPBanner\Banner;
use Borort\PHPBanner\BannerDisplay;

//set system's default timezone
date_default_timezone_set('Asia/Tokyo');

//create an array of banner instances
$banners[] = new Banner('banner1', 'banner1.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');
$banners[] = new Banner('banner2', 'banner2.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');

//display the banners
$userTimeZone = '';// default 'Asia/Tokyo'
$displayed_banners = new BannerDisplay($banners, $userTimeZone);
print_r($displayed_banners->display());
```

Setting the display period for the individual banner

```php
$banners[0]->setDisplayPeriod('2021-04-26 12:00:00', '2021-04-29 23:59:59');
```

Overiding default user's timezone, current time, and client IP

```php
$userTimeZone = 'America/Los_Angeles';
$clientIP = '10.0.0.1';
$now = '2021-04-25 12:00:00';
$displayed_banners = new BannerDisplay($banners, $userTimeZone, $now, $clientIP);
print_r($displayed_banners->display());

```


## Testing the package/classes

#### Installing dependencies

```
composer install
```

#### Unit testing using PHPUnit

```
./vendor/bin/phpunit
```
#### Demo

```
php tests/demo.php
```
You may modify the demo.php file to test with different display period and condition as needed.


