<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Models\User as Model;

class UserRepository extends CoreRepository implements UserRepositoryContract
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return $this->startConditions()->create($data);
    }

    /**
     * @inheritDoc
     */
    public function findByLogin(string $login): ?Model
    {
        return $this->startConditions()->where('login', '=', $login)->first();
    }
}
