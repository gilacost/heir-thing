<?php

namespace spec\Family;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FamilySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Family\Family');
    }

    function it_stores_a_collection_of_family_members(\Family\Member $member)
    {
        $this->addMember($member);
        $this->getMembers()->shouldHaveCount(1);
    }

    function it_returns_a_family_member(\Family\Member $member)
    {
        $this->addMember($member);
        $this->getMember(NULL)->shouldHaveType('\Family\Member');
        $this->shouldThrow('\Exception')->duringgetMember('memeberName');
    }

    function it_returns_all_family_members(\Family\Member $member1,\Family\Member $member2)
    {
        $this->addMember($member1);
        $this->addMember($member2);
        $this->getMembers()->shouldHaveCount(2);
    }

    function it_checks_memebers_age(\Family\Member $member1,
                                    \Family\Member $member2,
                                    \Time $time)
    {
        $this->addMember($member1);
        $this->addMember($member2);
        $time->isOlderThan($member1)->shouldBeCalled();
        $time->isOlderThan($member2)->shouldBeCalled();
        $this->checkMembersAge($time);
    }

}
