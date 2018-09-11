<?php
namespace MyApp\Entity;

use GraphQL\Utils\Utils;
use MyApp\Template\Media;
use MyApp\Template\DateRestricted;

/**
 * @Entity @Table(name="music")
 **/
class MusicBenefit implements Benefit
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
     /** @Column(type="string") **/
    protected $name;
     /** @Column(type="string") **/
    protected $slug;

    /**
     * @ManyToOne(targetEntity="Music")
     **/
    protected $music;

    private function __construct() {
        $this->music = new ArrayCollection();
    }

    public static function fromArray(array $data = []) {
        return new static($data);
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

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function hasMusic (MyApp\Entity\Music $music) {
        return (bool)$this->getMusic()->find($music->getId());
    }

    public function getMusic (MyApp\Entity\Music $music) {
        return $this->music;
    }

    public function addMusic (MyApp\Entity\Music $music) {
        if (!$this->hasMusic($music)) {
            $this->music[] = $music;
        }
    }

    public function removeMusic (MyApp\Entity\Music $music) {
        $this->getMusic()->removeElement($music);
    }
}