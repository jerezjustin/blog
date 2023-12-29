<?php

declare(strict_types=1);

namespace App\QueryFilters;

use App\Contracts\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class SortByTitle implements FilterInterface
{
    public function __construct(protected ?string $direction)
    {
    }

    public function handle(Builder $query, mixed $next): mixed
    {
        $query->orderBy('title', in_array($this->direction, ['asc', 'desc']) ? $this->direction : 'desc');

        return $next($query);
    }
}
