<?php declare(strict_types=1);

use Borort\PHPBanner\Banner;
use PHPUnit\Framework\TestCase;

final class BannerTest extends TestCase
{
    public function testCanGetAttributeValue(): void
    {
        $banner = new Banner('banner1', 'banner1.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');
        $this->assertTrue($banner->title === 'banner1');
        $this->assertTrue($banner->image === 'banner1.jpg');
        $this->assertTrue($banner->url === '#');
        $this->assertTrue($banner->startDate === '2021-04-25 12:00:00');
        $this->assertTrue($banner->endDate === '2021-04-28 23:59:59');
    }

    
    public function testCanSetDisplayPeriod(): void
    {
        $banner = new Banner('banner1', 'banner1.jpg', '#', '2021-04-25 12:00:00', '2021-04-28 23:59:59');
        $banner->setDisplayPeriod('2021-04-25 16:30:39', '2021-04-28 16:30:39');
        $this->assertEquals($banner->startDate, '2021-04-25 16:30:39');
        $this->assertEquals($banner->endDate, '2021-04-28 16:30:39');
    }


    
}
