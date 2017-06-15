<?php

/**
 * CategoriesList.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */

class CategoriesList implements Countable
{
    private $_list;
    
    /**
     * CategoriesList constructor.
     */
    public function __construct()
    {
        $this->_list = [];
    }

    /**
     * Returns category last parent with $depth
     * @param int $depth
     * @return Category
     */
    public function getLastParent(int $depth = 0) : Category
    {
        if($depth == 0) {
            return end($this->_list);
        }
        else {
            return end(end(end($this->_list)->getChildren()));
        }
    }

    /**
     * @param Category $category
     */
    public function add(Category $category)
    {
        $this->_list[] = $category;
    }

    public function getCategoriesWithDepth(int $depth)
    {
        if($depth == 2) {
            return $this->getSecondDepthCategories();
        }
        if($depth == 1) {
            return $this->getFirstDepthCategories();
        }
        
    }

    /**
     * @return array
     */
    public function getSecondDepthCategories()
    {
        $secondDepthCategoriesList = new CategoriesList();
        foreach($this->_list as $item)
        {
            if($item->hasChildren()) {
                $mainChildrenList = $item->getChildren();
                foreach($mainChildrenList->_list as $childItem)
                {
                    $secondChildrenList = $childItem->getChildren();
                    foreach($secondChildrenList->_list as $category) {
                        if($category->getDepth() == 2) {
                            $secondDepthCategoriesList->add($category);
                        }
                    }
                }
            }
        }
        return $secondDepthCategoriesList->_list;
    }

    /**
     * @return array
     */
    public function getFirstDepthCategories()
    {
        $firstDepthCategoriesList = new CategoriesList();
        foreach($this->_list as $item)
        {
            if($item->hasChildren()) {
                $mainChildrenList = $item->getChildren();
                foreach($mainChildrenList->_list as $category)
                {
                    if($category->getDepth() == 1) {
                        $firstDepthCategoriesList->add($category);
                    }
                }
            }
        }
        return $firstDepthCategoriesList->_list;
    }

    /**
     * Count elements of an list
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->_list);
    }


}