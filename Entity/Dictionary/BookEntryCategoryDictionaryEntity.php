<?php

namespace Entity\Dictionary;

/**
 * Class BookEntryCategoryDictionaryEntity
 * @package Entity
 */
class BookEntryCategoryDictionaryEntity {
    public const CATEGORY_NAME_CHARGE = 'charge';

    public const COLUMN_OWE = 'owe';

    /** @var string */
    protected $categoryName;

    /** @var string */
    protected $column;

    /**
     * BookEntryCategoryDictionaryEntity constructor.
     * @param $categoryName
     * @param $column
     */
    public function __construct(string $categoryName, string $column) {
        $this->categoryName = $categoryName;
        $this->column = $column;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     * @return BookEntryCategoryDictionaryEntity
     */
    public function setCategoryName(string $categoryName): BookEntryCategoryDictionaryEntity {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getColumn(): string {
        return $this->column;
    }

    /**
     * @param string $column
     * @return BookEntryCategoryDictionaryEntity
     */
    public function setColumn(string $column): BookEntryCategoryDictionaryEntity {
        $this->column = $column;
        return $this;
    }
}