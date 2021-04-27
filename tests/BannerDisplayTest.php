<?php declare(strict_types=1);

use Borort\PHPBanner\Banner;
use Borort\PHPBanner\BannerDisplay;
use PHPUnit\Framework\TestCase;

final class BannerDisplayTest extends TestCase
{
    
    protected $banners = [];

    protected function setUp(): void
    {
        date_default_timezone_set('Asia/Tokyo');
        $this->banners[] = new Banner('banner1', 'banner1.jpg', '#', '2021-04-25 09:00:00', '2021-04-28 23:59:59');
    }
    
    
    public function testBannerShouldBeDisplayed(): void
    {
        
        $now = '2021-04-26 09:00:00';
        $userTimeZone = ''; # Asia/Tokyo as default
        
        $clientIP = '';
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone, $now, $clientIP);
        $this->assertTrue(isset($displayed_banners->display()[0]));

        //without additional params - default mode
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone);
        $this->assertTrue(isset($displayed_banners->display()[0]));

    }


    public function testBannerShouldBeDisplayedDifferentTimezone(): void
    {
        $now = '2021-04-24 17:00:00';
        $userTimeZone = 'America/Los_Angeles';

        $clientIP = '';
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone, $now, $clientIP);
        $this->assertTrue(isset($displayed_banners->display()[0]));

    }


    public function testBannerShouldBeDisplayedInternalIP(): void
    {
        $now = '2021-04-25 20:30:00';
        $userTimeZone = 'Asia/Tokyo';
        
        $clientIP = '10.0.0.1';
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone, $now, $clientIP);
        $this->assertTrue(isset($displayed_banners->display()[0]));

        $clientIP = '10.0.0.2';
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone, $now, $clientIP);
        $this->assertTrue(isset($displayed_banners->display()[0]));

    }


    public function testBannerShouldNotBeDisplayedWhenExpires(): void
    {
        
        $now = '2021-04-29 00:00:00';
        $userTimeZone = 'Asia/Tokyo';
        
        $clientIP = '';
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone, $now, $clientIP);
        $this->assertFalse(isset($displayed_banners->display()[0]));

        $clientIP = '10.0.0.1';
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone, $now, $clientIP);
        $this->assertFalse(isset($displayed_banners->display()[0]));

        $clientIP = '10.0.0.2';
        $displayed_banners = new BannerDisplay($this->banners, $userTimeZone, $now, $clientIP);
        $this->assertFalse(isset($displayed_banners->display()[0]));

    }


    
}
