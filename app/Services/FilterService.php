<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

class FilterService
{
    private Builder $builder;

    public function __construct(private readonly Pipeline $pipeline)
    {
    }

    public function filter(Builder $builder): self
    {
        $this->builder = $builder;

        return $this;
    }

    public function using(array $filters): Builder
    {
        return $this->pipeline
            ->send($this->builder)
            ->through($filters)
            ->thenReturn();
    }
}
