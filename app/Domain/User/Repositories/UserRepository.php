<?php

namespace Domain\User\Repositories;

use Infrastructure\Abstracts\EloquentRepository;
use Domain\User\Contracts\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getAll(array $filters = [])
    {
        $query = $this->model->orderBy($filters['orderBy'], $filters['orderByDirection']);

        $filterableTextColumns = ['name', 'email', 'createdAt', 'updatedAt'];

        foreach ($filterableTextColumns as $column) {
            if ($filters[$column] !== null) {
                $query = $query->where($column, 'like', '%' . $filters[$column] . '%');
            }
        }

        return $query->paginate(config('constants.pagination.default_items_per_page'));
    }
}
