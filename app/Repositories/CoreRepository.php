<?php

namespace App\Repositories;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Repository for working with an entity.
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    private Model $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return string
     */
    abstract protected function getModelClass(): string;

    /**
     * @return Model
     */
    protected function startConditions(): Model
    {
        return clone $this->model;
    }
}
