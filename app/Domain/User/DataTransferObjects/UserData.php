<?php

namespace Domain\User\DataTransferObjects;

class UserData
{
    // public int $id;
    // public string $name;
    // public string $email;
    // public string $password;

    public function __construct($data)
    {
        // $this->id = $data['id'];
        // $this->name = $data['name'];
        // $this->email = $data['email'];

        foreach ($data as $key => $value)
        {
            if (!empty($value))
            {
                $this->$key = $value;
            }
        }
    }

    public function getFilledData()
    {
        return array_filter(get_object_vars($this), function ($property) {
            return !empty($property);
        });
    }
}
