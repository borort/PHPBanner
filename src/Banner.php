<?php
/**
 * Banner class (part of Borort\PHPBanner package)
 * @author Borort Sort <borort@gmail.com>
 * @license http://www.opensource.org/licenses/MIT
 */
namespace Borort\PHPBanner;

class Banner 
{
    /**
     * Banner's title
     *
     * @var string
     */
    public $title;

    /**
     * Banner's image
     *
     * @var string
     */
    public $image;
    
    /**
     * Banner's url
     *
     * @var string
     */
    public $url;
    
    /**
     * Banner's display start date
     *
     * @var string
     */
    public $startDate;

    /**
     * Banner's display end date
     *
     * @var string
     */
    public $endDate;

    /**
     * @param string  $title
     * @param string  $image
     * @param string  $url
     * @param string  $startDate
     * @param string  $endDate
     */
    public function __construct($title, $image, $url, $startDate, $endDate) 
    {
        $this->title = $title;
        $this->image = $image;
        $this->url = $url;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Set the display period 
     * @param string  $startDate
     * @param string  $endDate
     * @return void
     */
    public function setDisplayPeriod($startDate, $endDate) 
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

}