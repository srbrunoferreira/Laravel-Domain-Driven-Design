<?php

namespace Infrastructure\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface EloquentRepositoryInterface
{
    /**
     * @param int $id
     * @return RepositoryInterface
     */
    public function findOneById(int $id): Model;

    /**
     * @param array $criterea
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOneBy(array $criterea): Model;

    /**
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int;

    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(array $data): Model;

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int;

    /**
     * @param array $criterea
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findManyBy(array $criterea): Collection;

    /**
     * @param array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByIdWhereIn(array $ids): Collection;

    /**
     * @param array $filters
     * @param \Illuminate\Foundation\Http\FormRequest $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(array $filters = []);
}
