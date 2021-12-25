<?php

namespace Infrastructure\Abstracts;

use Infrastructure\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class EloquentRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findOneById(int $id): Model
    {
        return $this->findOneBy(['id' => $id]);
    }

    public function findOneBy(array $criterea): Model
    {
        return $this->model->where($criterea)->firstOrFail();
    }

    public function update(int $id, array $data): int
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function store(array $data): Model
    {
        return $this->model->create($data);
    }

    public function delete(int $id): int
    {
        return $this->model->where('id', $id)->delete();
    }

    public function findManyBy(array $criterea): Collection
    {
        return $this->model->where($criterea)->get();
    }

    public function findByIdWhereIn(array $ids): Collection
    {
        return $this->model->whereIn('id', $ids)->get();
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }
}
