<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Scopes\ActiveScope;
use App\Scopes\SearchScope;
use App\Scopes\EditScope;
use App\Post;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static function boot()
    {
        parent::boot();

       // static::addGlobalScope(new ActiveScope);
    }

    use SearchScope;
    use EditScope;

    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'role', 'email', 'password','address', 'sex', 'name', 'delete_flag', 'birth'
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

    public $timestamps = false;
}
