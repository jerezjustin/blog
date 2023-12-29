<?php

declare(strict_types=1);

namespace App\QueryFilters;

use App\Contracts\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class FilterByTitle implements FilterInterface
{
    public function __construct(protected ?string $title)
    {
    }

    public function handle(Builder $query, $next): mixed
    {
        $query->when($this->title, function (Builder $query) {
            $query->where('title', 'like', '%' . $this->title . '%');
        });

        return $next($query);
    }
}
