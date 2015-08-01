<?php namespace Goods;

use Family\FamilyCollection;
use Family\Member;

abstract class Good {

    protected $splitsRecursively = false;

//    /**
//     * The size of the land measured on m^2
//     *
//     * @var
//     */
    protected $amount;

    public abstract function getMonetaryValue();

    public abstract function split(Array $children , FamilyCollection $family);

    public function increments($amount)
    {
        $this->amount+=$amount;
    }

    /**
     * Update's child good.
     *
     * @param Member $member
     * @param $amount
     */
    protected function updateGood(Member $member,$amount)
    {
        $goodClassName = get_called_class();
        $good = new $goodClassName;
        if (!isset($member->goods()[$goodClassName])) {
            $good->amount = $amount;
        } else {
            $good->amount = $member->goods()[$goodClassName]->amount() + $amount;
        }
        $member->receiveGood($good);
    }

    /**
     * Update goods between children.
     *
     * @param array $members
     * @param array $goodsValue
     * @param $property
     * @param FamilyCollection $family
     */
    protected function updateGoods(Array $members, Array $goodsValue ,$property ,FamilyCollection $family)
    {
        $x=0;
        $goodClassName = get_called_class();
        foreach($members as $member)
        {
            if ($good = $member->hasGood($goodClassName)) {
                $good->increments($goodsValue[$x],$property);
            } else {
                $good = new $goodClassName;
                $good->amount = $goodsValue[$x];
            }
            $member->receiveGood($good);
            if($this->splitsRecursively)
            $good->splitRecursive($member , $family);
            $x++;
        }
    }
    protected function amount()
    {
        return $this->amount;
    }
}