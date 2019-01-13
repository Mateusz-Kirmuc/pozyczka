<?php

namespace Entity\Dictionary;

/**
 * Class BookEntryCategoryDictionaryEntity
 * @package Entity
 */
class BookEntryCategoryDictionaryEntity {
    public const CATEGORY_NAME_CHARGE = 'charge';

    /** @var string */
    protected $categoryName;

    /**
     * BookEntryCategoryDictionaryEntity constructor.
     * @param $categoryName
     */
    public function __construct(string $categoryName) {
        $this->categoryName = $categoryName;
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
}