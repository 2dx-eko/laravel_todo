<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class todo extends Model
{
    $todos = DB::select('select * from todos');
    return $todos;
}
