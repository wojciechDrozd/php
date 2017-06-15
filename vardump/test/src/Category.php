<?php

/**
 * Category.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */

class Category
{
    private $_name;
    private $_depth;
    private $_children;
    private $_parent;
    private $_url;
    private $_nameWithParent;
    
    /**
     * Category constructor.
     */
    public function __construct(string $categoryName, int $depth, string $url, Category $parent = null)
    {
        $this->_name        = $categoryName;
        $this->_depth       = $depth;
        $this->_url         = $url;
        $this->_children    = new CategoriesList();
        $this->_parent      = $parent;
        $this->_nameWithParent;
    }

    /**
     * @param Category $childCategory
     */
    public function addChild(Category $childCategory)
    {
        $this->_children->add($childCategory);
    }

    /**
     * @param Category $parentCategory
     */
    public function setParent(Category $parentCategory)
    {
        $this->_parent = $parentCategory;
    }

    /**
     * @return int
     */
    public function getDepth() : int
    {
        return $this->_depth;
    }

    /**
     * @return bool
     */
    public function hasChildren() : bool
    {
        return (bool) count($this->_children);
    }

    /**
     * @return CategoriesList
     */
    public function getChildren() : CategoriesList
    {
        return $this->_children;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getUrlWithoutDomain() : string
    {
        return $this->_url;
    }

    /**
     * @return string
     */
    public function getNameWithParentName() : string
    {
        $this->_nameWithParent = '';
        if($this->_parent instanceof Category) {
            $this->_nameWithParent = $this->_parent->getNameWithParentName() . ' / ';
        }
        $this->_nameWithParent .= $this->getName();
        return $this->_nameWithParent;
    }
}