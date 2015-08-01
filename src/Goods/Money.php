<?php namespace Goods;

use Family\Family;
use Family\FamilyCollection;
use Family\Member;

class Money extends Good
{

    /**
     * @param $amount
     */
    public function __construct($amount = 0)
    {
        $this->amount = $amount;
        $this->splitsRecursively = true;
    }

    /**
     * Split money between children taking into account children's age.
     *
     * @param array $children
     * @param FamilyCollection $family
     * @param array $amountsArray
     */
    public function split(array $children, FamilyCollection $family, array $amountsArray = [])
    {
//        $amountsArray = $this->getAmountsToBeSplitted($children, $amountsArray);
        if(empty($amountsArray))
        $amountsArray  = splitIntIntoArrayNoFloats($this->amount, sizeof($children));
        $members = $family->sortChildrenByAgeAndName($children);
        $this->updateGoods(
            $members,
            $amountsArray,
            'amount',
            $family
        );
    }

    /**
     * Keeps on splitting until there is no more children
     *
     * @param Member $member
     * @param Family $family
     */
    public function splitRecursive(Member $member, Family $family)
    {
        if ($member->hasChildren()) {
            $amountsArray = splitIntIntoArrayNoFloats($this->amount, 2);
            $this->amount = $amountsArray[0];
            $this->split(
                $member->children(),
                $family,
                splitIntIntoArrayNoFloats($amountsArray[1], sizeof($member->children()))
            );
        }
    }

    /**
     * Returns amount
     *
     * @return mixed
     */
    public function getMonetaryValue()
    {
        return $this->amount;
    }

    /**
     * Sets the larger half amount to itself and splits the other half between descendants
     *
     * @param array $children
     * @param array $isRecursive
     * @return array
     */
//    protected function getAmountsToBeSplitted(array $children, array $isRecursive)
//    {
//        if (!empty($isRecursive)) {
//            var_dump($children);
//            var_dump($isRecursive[0]);
//            var_dump($this);
//            $this->amount = $isRecursive[0];
//            $amountsArray = splitIntIntoArrayNoFloats($isRecursive[1], sizeof($children));
//            return $amountsArray;
//        } else {
//            $amountsArray = splitIntIntoArrayNoFloats($this->amount, sizeof($children));
//            return $amountsArray;
//        }
//    }
}