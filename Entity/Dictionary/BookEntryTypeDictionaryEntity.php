<?php

namespace Entity\Dictionary;

/**
 * Class BookEntryTypeDictionaryEntity
 * @package Entity
 */
class BookEntryTypeDictionaryEntity {
    /** @var string */
    protected $type;

    /**
     * BookEntryTypeDictionaryEntity constructor.
     * @param $type
     */
    public function __construct($type) {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BookEntryTypeDictionaryEntity
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}