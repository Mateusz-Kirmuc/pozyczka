<?php

namespace Entity\Dictionary;

/**
 * Class BookEntryTypeDictionaryEntity
 * @package Entity
 */
class BookEntryTypeDictionaryEntity {
    const TYPE_NAME_CAPITAL = 'capital';
    const TYPE_NAME_PROVISION = 'provision';
    const TYPE_NAME_INTEREST = 'interest';
    const TYPE_NAME_PAYMENT = 'payment';

    /** @var string */
    protected $typeName;

    /**
     * BookEntryTypeDictionaryEntity constructor.
     * @param $type
     */
    public function __construct(string $type) {
        $this->typeName = $type;
    }

    /**
     * @return string
     */
    public function getTypeName(): string {
        return $this->typeName;
    }

    /**
     * @param string $typeName
     * @return BookEntryTypeDictionaryEntity
     */
    public function setTypeName(string $typeName): BookEntryTypeDictionaryEntity {
        $this->typeName = $typeName;
        return $this;
    }
}