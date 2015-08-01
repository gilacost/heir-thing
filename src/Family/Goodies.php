<?php namespace Family; 
trait Goodies {

    public function receiveGood($good)
    {
        $this->goods [get_class($good)] = $good;
    }

    public function hasGoods()
    {
        return !empty($this->goods);
    }

    public function hasGood($type)
    {
        return isset($this->goods[$type])?$this->goods[$type]:false;
    }
    /**
     * @return array
     */
    public function goods()
    {
        return $this->goods;
    }

    /**
     * @param array $goods
     */
    public function goodsAre($goods)
    {
        $this->goods = $goods;
    }

    public function splitHeritageBetweenChildren(FamilyCollection $family)
    {
        foreach ($this->goods as $good) {
            $good->split($this->children,$family);
        }
    }
    public function calculateGoodMonetaryValue()
    {
        $heritage = 0;
        if($this->hasGoods()){
            foreach ($this->goods as $good) {
                $heritage+=$good->getMonetaryValue();
                //todo extract to method that receibes interface good
            }
        }
        return $heritage;
    }

    public function getRidOff($type)
    {
        unset($this->goods[$type]);
    }

}