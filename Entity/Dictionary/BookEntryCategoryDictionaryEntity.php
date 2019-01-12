<?php

namespace Entity\Dictionary;

/**
 * Class BookEntryCategoryDictionaryEntity
 * @package Entity
 */
class BookEntryCategoryDictionaryEntity {
    /** @var string */
    protected $categoryName;

    /** @var string */
    protected $column;

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     * @return BookEntryCategoryDictionaryEntity
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param string $column
     * @return BookEntryCategoryDictionaryEntity
     */
    public function setColumn($column)
    {
        $this->column = $column;
        return $this;
    }
}