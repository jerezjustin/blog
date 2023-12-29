<?php

declare(strict_types=1);

namespace App\QueryFilters;

use App\Contracts\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class FilterByCategory implements FilterInterface
{

    public function __construct(protected ?string $category)
    {
    }
    public function handle(Builder $query, mixed $next): mixed
    {
        $query->when($this->category, function (Builder $query) {
            $query->whereHas('categories', function (Builder $query) {
                $query->where('slug', $this->category);
            });
        });

        return $next($query);
    }
}
