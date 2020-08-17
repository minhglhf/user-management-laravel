<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

}
