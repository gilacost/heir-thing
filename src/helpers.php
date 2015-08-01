<?php

function parentIsOlderAndIsParent(\Family\Family $family,$member)
{
    $parent = $family->getMember($member['parent']);
    if($parent)
    {
        if (!in_array($member['name'], $parent->children())) {
            throw new Exception('Parent must be defined on child and child must be defined on parent');
        }
        $parentTimestamp = $parent->birthDate()->getTimestamp();
        if($member['birth_date']->getTimestamp()< $parentTimestamp ){
            throw new Exception('Parent must be older...');
        }
    }
}
function loadData(Array $family)
{
    $familyCollection = new Family\Family();
    foreach ($family as $member) {
        parentIsOlderAndIsParent($familyCollection,$member);
        $memberInstance = new Family\Member(
            $member['parent'],
            $member['name'],
            $member['children'],
            $member['birth_date']
        );
        foreach ($member['goods'] as $good) {
            switch ($good['type']) {
                case 'Land':
                    list($amount, $unitPrize) = $good['arguments'];
                    $good = new Goods\Land($amount, $unitPrize);
                    break;
                case 'Money':
                case 'State':
                    list($amount) = $good['arguments'];
                    $className = 'Goods\\'. $good['type'];
                    $good = new $className($amount);
                    break;
                default:throw new Exception('Invalid Good type...');
            }
            $memberInstance->receiveGood($good);
        }
        $familyCollection->addMember($memberInstance,$memberInstance->name());
    }
    return $familyCollection;
}
function splitIntIntoArrayNoFloats($int ,$arraySize)
{
    $float = $int/$arraySize;
    $floatValues = array_fill(0,$arraySize,$float);
    $rest = 0;
    foreach ($floatValues as $floatValue) {
        $rounded = round($floatValue);
        $rest += $floatValue-$rounded;
        $moneySplitted[]=round($floatValue);
    }
    $rest = round($rest);
    if(round($rest) > 0)
    {
        $moneySplitted[0]+=$rest;
    }else{
        $moneySplitted[sizeof($moneySplitted)-1]+=$rest;
    }
    return $moneySplitted;
}

function cloneObjectsArray(Array $array)
{
    $new = [];
    foreach ($array as $k => $v) {
        $new[$k] = clone $v;
    }
    return $new;
}