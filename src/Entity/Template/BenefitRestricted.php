<?php
namespace MyApp\Entity\Template;

interface BenefitRestricted
{
    //attach entity to the provided benefit
    public function assignToBenefit(MyApp\Entity\Benefit $benefit);
    //remove entity from a benefit
    public function detachFromBenefit(MyApp\Entity\Benefit $benefit);
    public function hasBenefit(MyApp\Entity\Benefit $benefit);
}