<?php 
class Time implements IDontWantToDie
{

    private $time;

    public function __construct(\DateTime $time)
    {
        $this->time = $time;
    }

    public function isOlderThan(Family\Member $member)
    {
        $age = $this->time->diff($member->birthDate());
        if ($age->y > 100 || ($age->y == 100 && $age->m > 0)) {
            $member->died();
        }
    }
}