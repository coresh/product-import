<?php

namespace BigBridge\ProductImport\Model\Resource\Reference;

/**
 * @author Patrick van Bergen
 */
class References
{
    public $names;

    public function __construct(array $names)
    {
        $this->names = array_map('trim', $names);
    }

}