<?php namespace Goods;

use Family\FamilyCollection;

class Land extends Good
{
    /**
     * Price per land unit
     *
     * @var int
     */
    private $unitPrize;

    /**
     * @param $amount
     * @param int $unitPrize
     */
    public function __construct($amount=0,$unitPrize = 300)
    {
        $this->unitPrize = $unitPrize;
        $this->amount = $amount;
    }

    /**
     * Calculates Land monetary value
     *
     * @return mixed
     */
    public function getMonetaryValue()
    {
        return $this->amount * $this->unitPrize;
    }

    /**
     * Gives land to oldest son
     *
     * @param array $children
     * @param FamilyCollection $family
     */
    public function split(Array $children , FamilyCollection $family)
    {
        $member = $family->getFirstSon($children);
        $this->updateGood($member , $this->amount);
    }

}
