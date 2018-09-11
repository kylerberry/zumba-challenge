<?php
namespace MyApp\Entity;

use GraphQL\Utils\Utils;
use MyApp\Template\Media;
use MyApp\Template\DateRestricted;

/**
 * @Entity @Table(name="music")
 **/
class Music implements Media, DateRestricted, BenefitRestricted
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
     /** @Column(type="string") **/
    protected $name;
     /** @Column(type="string") **/
    protected $url;
     /** @Column(type="string") **/
    protected $dateFrom;
     /** @Column(type="string") **/
    protected $dateTo;

    /**
     * @OneToMany(targetEntity="Benefit")
     **/
    protected $benefits;

    private function __construct() {
        $this->benefits = new ArrayCollection();
    }

    public static function fromArray(array $data = []) {
        $music = new static($data);
        return $music;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Template\Media
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Template\Media
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    /*
    * Template\DateRestricted
    */
    public function isInactiveByDate() {
        return now() < $this->dateFrom;
    }

    /*
    * Template\DateRestricted
    */
    public function isActiveByDate() {
        return now() >= $this->dateFrom && now() < $this->dateTo;
    }

    /*
    * Template\DateRestricted
    */
    public function isExpiredByDate() {
        return now() >= $this->dateFrom;
    }

    /*
    * Template\DateRestricted
    */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /*
    * Template\DateRestricted
    */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /*
    * Template\DateRestricted
    */
    public function setDateFrom($date)
    {
        $this->dateFrom = $date;
    }

    /*
    * Template\DateRestricted
    */    
    public function setDateTo($date)
    {
        $this->dateTo = $date;
    }

    public function hasBenefit (MyApp\Entity\Benefit $benefit) {
        return (bool)$this->getBenefits()->find($benefit->getId());
    }

    public function getBenefits () {
        return $this->benefits;
    }

    public function addBenefit (MyApp\Entity\Benefit $benefit) {
        if (!$this->hasBenefit($benefit)) {
            $this->benefits[] = $benefits;
        }
    }

    public function removeBenefit (MyApp\Entity\Benefit $benefit) {
        $this->getBenefits()->removeElement($benefit);
    }
}

// To Add Benefits
//$musicEntity->addBenefit($benefitEntity);

// To Remove Benefit
//$musicEntity->removeBenefit($benefitEntity);