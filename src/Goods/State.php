<?php namespace Goods; 
use Family\FamilyCollection;

class State extends Good{

    private $value = 100000;

    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }
    public function getMonetaryValue()
    {
        return $this->value * $this->amount;
    }

    public function split(Array $children, FamilyCollection $family)
    {
        $members = $family->sortChildrenByAgeAndName($children);
        $memberNames = array_keys($members);
        $whichMember = 0;
        $howManyMembers = sizeof($members);
        for($x = 0 ; $x<$this->amount;$x++)
        {
            $this->updateGood($members[$memberNames[$whichMember]],1);
            $whichMember++;
            if($whichMember>$howManyMembers-1)
            $whichMember = 0;
        }
    }
}