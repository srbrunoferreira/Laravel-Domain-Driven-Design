<?php

namespace Infrastructure\Abstracts;

use Infrastructure\Contracts\DataTransferObjectInterface;

abstract class DataTransferObject implements DataTransferObjectInterface
{
    /**
     * Returns all properties in a array.
     *
     * @param \Infrastructure\Contracts\DataTransferObjectInterface $object
     * @param bool $onlyNonNull - if true, returns only non empty properties.
     * @return array
     */
    private function getFilledData(DataTransferObjectInterface $object, $onlyNonNull = true): array
    {
        return array_filter(
            get_object_vars($object),
            function ($property) use ($onlyNonNull) {
                return $onlyNonNull ? !empty($property) : true;
            }
        );
    }

    public function toArray(): array
    {
        return $this->getFilledData($this);
    }

    public function allToArray(): array
    {
        return $this->getFilledData($this, false);
    }
}
