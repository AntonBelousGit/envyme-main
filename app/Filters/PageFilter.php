<?php


namespace App\Filters;


class PageFilter extends QueryFilter
{
    public function name($name)
    {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }
}
