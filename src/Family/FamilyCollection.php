<?php namespace Family;

interface FamilyCollection
{
    /**
     * @param Member $member
     */
    public function addMember(Member $member);

    /**
     * Get's member by his name
     *
     * @param $memberName
     * @return mixed
     */
    public function getMember($memberName);

    /**
     * Get all Memebers
     *
     * @return mixed
     */
    public function getMembers();

    /**
     * Check family members are older than 100
     *
     * @param \Time $currentTime
     */
    public function checkMembersAge(\Time $currentTime);

    /**
     * Updates heritage of dead family members
     */
    public function heritageUpdate();

    /**
     * Sort member children by name and if there are two child with same
     * age they are ordered by their names.
     *
     * @param array $childrenNames
     * @return mixed
     */
    public function sortChildrenByAgeAndName(Array $childrenNames);

    /**
     * Gets the first son
     *
     * @param array $childrenNames
     * @return mixed
     */
    public function getFirstSon(Array $childrenNames);
}