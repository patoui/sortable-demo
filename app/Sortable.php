<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Sortable
{
    /**
     * Scope a query to sort results.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSort(Builder $query, Request $request)
    {
        // Get sortable column
        $sortables = data_get($this, 'sortables', []);

        // Get the column to sort
        $sort = $request->get('sort');

        // Get the direction of which to sort
        $direction = $request->get('direction', 'desc');

        // Ensure column to sort is part of model's sortables property
        // and that the direction is a valid value
        if ($sort
            && in_array($sort, $sortables)
            && $direction
            && in_array($direction, ['asc', 'desc'])) {
            // Return ordered query
            return $query->orderBy($sort, $direction);
        }

        // No sorting, return query
        return $query;
    }
}
