<?php

namespace App\Contracts\Services;

interface EventServiceContract
{

    /**
     * Create an event
     * @param array $data
     * @return void
     */
    public function store(array $data): void;
}
