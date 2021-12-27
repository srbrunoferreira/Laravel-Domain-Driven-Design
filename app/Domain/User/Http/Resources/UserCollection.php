<?php

namespace Domain\User\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Domain\User\Entities\User;

class UserCollection extends ResourceCollection
{
    public $collects = User::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        foreach ($this->collection as $resource)
        {
        }

        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
