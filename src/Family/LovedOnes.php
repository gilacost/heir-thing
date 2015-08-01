<?php namespace Family; 
trait LovedOnes {

    public function hasChildren()
    {
        return !empty($this->children);
    }

    public function childrenAre(Array $children)
    {
        $this->children = $children;
    }

    public function children()
    {
        return $this->children;
    }
}