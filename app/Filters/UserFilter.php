<?php


namespace App\Filters;


use Illuminate\Http\Request;

class UserFilter extends QueryFilter
{
    public function name($name)
    {
       return $this->builder->where('name', 'like', '%' . $name . '%')
           ->orWhere('email', 'like', '%' . $name . '%');
    }

    public function role($role)
    {
        if(is_numeric($role))
        {
            return $this->builder->where('role_id',  $role);
        }
    }

}
