<?php

namespace Domain\User\DataTransferObjects;

use Infrastructure\DataTransferObject\DataTransferObject;
use Illuminate\Support\Carbon;

class UserData extends DataTransferObject
{
    protected ?int $id;
    protected ?string $name;
    protected ?string $email;
    protected ?string $password;
    protected ?Carbon $createdAt;
    protected ?Carbon $updatedAt;
    protected ?array $indexRequestFilters;

    /**
     * Initialize the values of the properties.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->password = $data['password'] ?? null;
        $this->createdAt = $data['createdAt'] ?? null;
        $this->updatedAt = $data['updatedAt'] ?? null;
        $this->indexRequestFilters = $data['filters'] ?? null;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of createdAt
     *
     * @return Carbon|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of updatedAt
     *
     * @return Carbon|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get the filters of an index request.
     *
     * @return array|null
     */
    public function getFilters()
    {
        return $this->indexRequestFilters;
    }
}
