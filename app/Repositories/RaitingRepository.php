<?php

namespace App\Repositories;

use App\Models\Raiting;
use App\Repositories\Interfaces\RaitingRepositoryInterface;

class   RaitingRepository implements RaitingRepositoryInterface
{
    public function create(array $fields)
    {
        $raiting = new Raiting();
        $raiting->fill($fields);
        $raiting->club()->associate($fields['club']);
        $raiting->save();
//        dd($fields);
//        $raiting->users()->save($fields['user']);
    }
}
