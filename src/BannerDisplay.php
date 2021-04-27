<?php
/**
 * A class to display banners (part of Borort\PHPBanner package)
 * @author Borort Sort <borort@gmail.com>
 * @license http://www.opensource.org/licenses/MIT
 */
namespace Borort\PHPBanner;


class BannerDisplay
{

    /**
     * The banner object array
     *
     * @var array
     */
    protected $banners = [];
    
    /**
     * Current time
     * e.g. "2021-04-25 12:00:00"
     * @var string
     */
    protected $now;

    /**
     * Client IP address
     *
     * @var string
     */
    protected $clientIP;
    

    /**
     * @param array  $banners
     * @param string $now
     * @param string $userTimeZone
     * @param string $clientIP
     */
    public function __construct($banners, $userTimeZone, $now = '', $clientIP = ''){

        $userTimeZone = empty($userTimeZone) ? 'Asia/Tokyo' : $userTimeZone;
        if(empty($now)) {
            $now = new \DateTime($userTimeZone);
        } else {
            $now = new \DateTime($now, new \DateTimeZone($userTimeZone));
        }
        $this->now = strtotime($now->format('Y-m-d H:i:s e'));
        $this->banners = $banners;

        if(empty($clientIP)) {
            $this->clientIP = $_SERVER['HTTP_CLIENT_IP'] 
                ?? $_SERVER['HTTP_X_FORWARDED'] 
                ?? $_SERVER['HTTP_X_FORWARDED_FOR'] 
                ?? $_SERVER['HTTP_FORWARDED'] 
                ?? $_SERVER['HTTP_FORWARDED_FOR'] 
                ?? $_SERVER['REMOTE_ADDR'] 
                ?? '0.0.0.0';
        } else {
            $this->clientIP = $clientIP;
        }

    }

    /**
     * Display banners
     * @return array
     */
    public function display() {

        $displayedBanners = [];

        foreach($this->banners as $banner) {
            $startDate = strtotime($banner->startDate);
            $endDate = strtotime($banner->endDate);
            if(in_array($this->clientIP, ['10.0.0.1', '10.0.0.2'])) {
                if($this->now <= $endDate) {
                    $displayedBanners[] = $banner;
                }
            } else {
                if($this->now >= $startDate && $this->now <= $endDate) {
                    $displayedBanners[] = $banner;
                }
            }
        }

        return $displayedBanners;
    }

}