<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    protected $request;
    protected $builder;
    protected $fields;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->fields = [];
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        //dd($this->filters());
        foreach ($this->filters() as $name => $value) {

            // isset определяет, объявлена ли переменная и отличается от null
            if(isset($value) && !empty($value)){
                if (method_exists($this, $name)) {
                    $this->fields[] = $name;
                    call_user_func_array([$this, $name], array_filter([$value]));
                }
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->query();
    }
}
