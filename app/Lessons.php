<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lessons extends Model
{

    public function insert_data($data){

        if(empty($data)){
            return false;
        }

         DB::table('lesson')->insert($data);

        return DB::getPdo()->lastInsertId();
    }
}
