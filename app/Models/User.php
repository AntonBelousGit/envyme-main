<?php

namespace App\Models;

use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Filters\Filtrable;


class User extends Authenticatable
{
    use Notifiable, Filtrable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'nickname', 'birthday', 'phone', 'email', 'country','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\UserProfile', 'user_profile_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function user_profile()
    {
        return $this->belongsTo('App\Models\UserProfile', 'user_profile_id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function scopeSort(Builder $query, Request $request)
    {
        //Get sortables columns
        $sortables = data_get($this, 'sortables', []);

        // Get the column to sort
        $sort = $request->get('sort');

        // Get the direction of which to sort
        $direction = $request->get('direction', 'desc');

        if ($sort
            && in_array($sort, $sortables)
            && $direction
            && in_array($direction, ['asc', 'desc'])) {
            // Return ordered query
            return $query->orderBy($sort, $direction);
        }

        return $query;
    }
}
