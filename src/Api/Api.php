<?php namespace Api;

use Family\FamilyCollection;

class Api
{

    use Render;
    private $familyBefore;
    private $familyAfter;

    public function getHeritageByName($name,FamilyCollection $family,$currentDate)
    {
        $this->familyBefore = cloneObjectsArray($family->getMembers());
        $family->checkMembersAge(new \Time($currentDate));
        $family->heritageUpdate();
        $this->familyAfter = $family->getMembers();
        $member = $family->getMember($name) ;
        return $member->calculateGoodMonetaryValue();
    }
}
