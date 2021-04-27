<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use Borort\PHPBanner\Banner;
use Borort\PHPBanner\BannerDisplay;

date_default_timezone_set('Asia/Tokyo');

$banners[] = new Banner('banner1', 'banner1.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');
$banners[] = new Banner('banner2', 'banner2.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');
$banners[] = new Banner('banner3', 'banner3.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');
$banners[] = new Banner('banner4', 'banner4.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');
$banners[] = new Banner('banner5', 'banner5.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');

/*
$banners[0]->setDisplayPeriod('2021-04-25 16:30:39', '2021-04-28 21:58:39');
$banners[1]->setDisplayPeriod('2021-04-25 16:30:39', '2021-04-28 21:58:39');
$banners[2]->setDisplayPeriod('2021-04-25 16:30:39', '2021-04-28 21:58:39');
$banners[3]->setDisplayPeriod('2021-04-25 16:30:39', '2021-04-28 21:58:39');
$banners[4]->setDisplayPeriod('2021-04-25 16:30:39', '2021-04-28 21:58:39');
*/

/*
$userTimeZone = 'America/Los_Angeles';
$clientIP = '10.0.0.1';
$now = '2021-04-25 12:00:00';
$displayed_banners = new BannerDisplay($banners, $userTimeZone, $now, $clientIP);
*/

$userTimeZone = ''; //default $userTimeZone = 'Asia/Tokyo'
$displayed_banners = new BannerDisplay($banners, $userTimeZone);
print_r($displayed_banners->display());


