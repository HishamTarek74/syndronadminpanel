<?php

namespace App\Http\Filters;

class SectionFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'paragraph',
    ];

    /**
     * Filter the query by a given title.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function title($value)
    {
        if ($value) {
            return $this->builder->whereTranslation('title', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by paragraph.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function paragraph($value)
    {
        if ($value) {
            return $this->builder->whereTranslation('paragraph', $value);
        }

        return $this->builder;
    }
}
