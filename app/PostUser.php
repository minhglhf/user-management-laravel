<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostUser extends Model
{
    public function getList(){
        return DB::table('user')->get();
    }

}
