<?php namespace Family;

use \DateTime;

class Family implements FamilyCollection
{

    private $members;

    /**
     * @param Member $member
     */
    public function addMember(Member $member)
    {
        //todo check member name unique
        $this->members[] = $member;
    }

    /**
     * Get's member by his name
     *
     * @param $memberName
     * @return mixed
     * @throws \Exception
     */
    public function getMember($memberName)
    {
        if ($this->members) {
            foreach ($this->members as $member) {
                if ($member->name() === $memberName)
                    return $member;
            }
            throw new \Exception('member doesnt exist');
        }
    }

    /**
     * Get all Memebers
     *
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Check family members are older than 100
     *
     * @param \Time $time
     */
    public function checkMembersAge(\Time $time)
    {
        foreach ($this->members as $member) {
            $time->isOlderThan($member);
        }
    }

    /**
     * Updates heritage of dead family members
     */
    public function heritageUpdate()
    {
        array_walk($this->members, [$this, 'splitHeritage']);
        $this->deleteGoodsFromDeadMembers();
    }

    /**
     * Sort member children by name and if there are two child with same
     * age they are ordered by their names.
     *
     * @param array $childrenNames
     * @return mixed
     */
    public function sortChildrenByAgeAndName(Array $childrenNames)
    {
        foreach ($childrenNames as $childName) {
            $childrenToBeSorted [$childName] = $this->getMember($childName);
        }
        ksort($childrenToBeSorted);
        uasort($childrenToBeSorted, function (Member $m1, Member $m2) {
            if ($m1->birthDate()->getTimestamp() === $m2->birthDate()->getTimestamp()) return 0;

            return ($m1->birthDate()->getTimestamp() > $m2->birthDate()->getTimestamp()) ? 1 : -1;
        });

        return $childrenToBeSorted;
    }

    /**
     * Gets the first son
     *
     * @param array $childrenNames
     * @return mixed
     */
    public function getFirstSon(Array $childrenNames)
    {
        $childrenByAgeAndName = $this->sortChildrenByAgeAndName($childrenNames);

        return array_shift($childrenByAgeAndName);
    }

    /**
     * Heritage update Callback
     * @param Member $member
     */
    private function splitHeritage(Member $member)
    {
        if (!$member->isAlive()) {
            $member->splitHeritageBetweenChildren($this);
        }
    }

    /**
     * Deletes good from parent
     */
    private function deleteGoodsFromDeadMembers()
    {
        foreach ($this->members as $member) {
            if (!$member->isAlive() && $member->hasGoods()) {
                    foreach ($member->goods() as $goodType => $good) {
                        $this->getMember($member->name())->getRidOff($goodType);
                    }
            }
        }
    }
}
