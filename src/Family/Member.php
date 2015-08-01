<?php namespace Family;

/**
 * Class Member
 * @package Family
 */
class Member
{
    use Goodies,LovedOnes;

    /**
     * @var
     */
    private $name;

    /**
     * @var bool
     */
    private $isAlive = true;

    /**
     * @var
     */
    private $birthDate;

    /**
     * @var
     */
    private $children;

    /**
     * @var
     */
    private $parent;

    /**
     * @var array
     */
    private $goods = [];


    /**
     * @param $parent
     * @param $name
     * @param $children
     * @param $birthDate
     */
    public function __construct($parent, $name, $children, $birthDate)
    {
        $this->parent = $parent;
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function parent()
    {
        return $this->parent;
    }

    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->isAlive;
    }

    /**
     *
     */
    public function died()
    {
        $this->isAlive = false;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function nameIs($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $birthDate
     */
    public function wasBorn($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function birthDate()
    {
        return $this->birthDate;
    }
}