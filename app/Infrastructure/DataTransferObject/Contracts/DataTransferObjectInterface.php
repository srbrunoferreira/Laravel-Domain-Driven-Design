<?php

namespace Infrastructure\DataTransferObject\Contracts;

interface DataTransferObjectInterface
{
    /**
     * Returns all non-null properties in an array.
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Returns all properties in a array, including null ones.
     *
     * @return array
     */
    public function allToArray(): array;
}
